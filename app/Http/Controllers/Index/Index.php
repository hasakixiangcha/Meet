<?php

namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;
use App\Model\Images;
use App\Model\Members;
use App\Model\Spouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  Illuminate\Foundation\Auth\ThrottlesLogins;

class Index extends Controller
{
    //
    use  ThrottlesLogins;

    protected  $maxAttempts=3;  //同一账号
    protected  $decayMinutes=1;
    public  function username(){
        return 'account';
    }
    public function index(){
        $title="主页";
        $status=1;
        $test=0;
        return  view('Index.index',compact('title','status','test'));
    }
    public function home(){
        $data=[
            '/Home/img/banner1.jpg',
            '/Home/img/banner2.jpg',
            '/Home/img/banner3.jpg'
        ];
        $title="<title>首页</title>";
        return view('Index.home',['login'=>true,'carousel'=>$data,'title'=>$title]);
    }

    //登录方法
    public function login(){
        session()->keep('url.intended');
        return view('Index.login',compact('login'));
    }

    public function loginauth(Request $request){
       $input=$request->except('_token');
       //规则验证
        $rules=[
            'account'=>[
                'required','regex:/^1[3-9]\d{9}$/'
            ],
            'password'=>[
                'required','regex:/(\d+[a-zA-Z]+)|([a-zA-Z]+\d+)/'
            ]
        ];
        $message=[
            'account.required'=>'账号必填',
            'password.required'=>'密码必填',
            'account.regex'=>'账号格式是手机号码',
            'password.regex'=>'密码必须是数字和字母'
        ];
        $validate=validator($input,$rules,$message);
        if($validate->fails()){
            $messages=$validate->errors()->messages();
            return back()->withErrors($messages)->withInput();
        }
        if($this->hasTooManyLoginAttempts($request)){ //如果请求次数过多
            $this->fireLockoutEvent($request); //锁定登录
            return back()->withErrors('登陆失败次数过多,请稍后再试');
        }
        //验证账号密码是否正确
        $remember=$request->has('remember');
        $res=Auth::guard('home')->attempt(['account'=>$input['account'],'password'=>$input['password']],$remember);
        if($res){
            return redirect()->intended('/Index/'); //跳转到原来想进入的页面
        }else{
            //记录登录次数
            $this->incrementLoginAttempts($request);
            return back()->withErrors('账号或密码不正确')->withInput();
        }
    }

    //注册方法
    public function register(){
        $login=false;
        return view('Index.register',compact('login'));
    }

    //注册保存
    public function store(Request $request){
        $input=$request->except('_token');//获取处理索引为_token的其他请求数据
        //规则验证
        $rules=[
            'nickname'=>'required|string|min:2|max:20',
            'avator'=>'required|string',
            'account'=>[
                'required','unique:members,account','regex:/^1[3-9]\d{9}$/'
            ],
            'password'=>['required','regex:/([a-zA-Z]+\d+)|(\d+[a-zA-Z]+)/','confirmed'],
            'monologue'=>'nullable|min:10|max:300'
        ];
        //验证错误消息
        $messages=[
            'nickname.required'=>'昵称必填',
            'avator.required'=>'头像必选',
            'account.required'=>'账号必填',
            'password.required'=>'密码必填',
            'nickname.string'=>'昵称必须是字符串',
            'nickname.min'=>'昵称至少两个字',
            'nickname.max'=>'昵称做多20个字',
            'account.unique'=>'该手机号码已存在',
            'account.regex'=>'手机号码格式不正确',
            'password.regex'=>'密码必须是由数字和字母组成',
            'password.confirmed'=>'两次密码不一致',
            'monologue.min'=>'独白至少十个字',
            'monologue.max'=>'独白最多三百字',
        ];
        $validate=validator($input,$rules,$messages);  //执行验证
        if($validate->fails()){  //验证规则失败
            $messages=$validate->errors()->messages();
            //dd($messages);
            return back()->withErrors($messages)->withInput();  //返回提交页面，把错误和输入信息(一次性的)带回
        }
        //头像处理
        $res=$this->handleImg($input['avator'],268,268,1);
        if(!$res){
            return back()->withErrors('图片不存在')->withInput();  //返回提交页面，把错误和输入信息(一次性的)带回
        }
        //添加到数据库

        //1.添加头像到图片表
        $imgid=Images::create([
            'title'=>$input['nickname'],
            'type'=>0,
            'path'=>$input['avator']
            ])->id;
        /* $res=Images::insertGetId([
              'title'=>$input['nickname'],
              'type'=>0,
              'path'=>$input['avator']
          ]);*/
        //2.往会员表中添加数据
        if($imgid){
            DB::beginTransaction(); //开启事务
            $mid=Members::create([
                'nickname'=>$input['nickname'],
                'account'=>$input['account'],
                'password'=>bcrypt($input['password']),//哈希加密
                'avator'=>$imgid,
                'monologue'=>$input['monologue'],
                'last_login_time'=>date('Y-m-d H:i:s')
            ])->id;
            $spid=Spouse::insertGetId(
                ['mid'=>$mid,'sex'=>$input['selectsex']]
            );
            if($spid){
                DB::commit(); //提交事务
                return redirect('/Index/login')->with(['account'=>$input['account'],'password'=>$input['password']]);
            }else{
                DB::rollBack();  //回滚事务
                return back()->withErrors('注册失败，请重试')->withInput();
            }
        }
    }

    //退出登录
    public function logout(){
        Auth::guard('home')->logout();
        return redirect('/Index/');
    }
}
