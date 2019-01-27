<?php

namespace App\Http\Controllers\Member;

use App\Model\Citys;
use App\Model\Images;
use App\Model\Members;
use App\Model\Spouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Member extends Controller
{
    public function __construct()
    {
      $this->middleware('loginauth')->except(['meet','lover','meetsearch']);
    }
    //个人中心
    public function index(){
        return view('Member.index');
    }

    //个人相册
    public function photos(){
        $userid=Auth::guard('home')->id(); //获取会员ID
        $images=Members::select('id')->find($userid)->images;
        if(!$images){
            $images=[];
        }
        return view('Member.photos',compact('images'));
    }

    //相册添加方法
    public function photosAdd(Request $request){
        $input=$request->except('_token');
        $userinfo=Auth::guard('home')->user()->only('id','nickname');
        if(!$request->has('goodsimages')){
            return back()->withErrors('请选择图片');
        }
        $insert=[];
        foreach ($input['goodsimages'] as $key=>$image){
            $res=$this->base64_image_content($image,'gallery');
            if(!$res){
                break;
            }else{
                $imgres=$this->handleImg($res,268,268,1);
                $insert[]=[
                    'tableid'=>$userinfo['id'],
                    'title'=>$userinfo['nickname'],
                    'path'=>$res,
                    'created_at'=>now(),
                    'updated_at'=>now()
                ];
            }
        }
       // Images::create();  //只能插入一条数据
        if(!$res){
            return back()->withErrors('图片上传失败');
        }else{
            $result=Images::insert($insert);  //可以插入一条或者多条数据,缺点:就是需要手动添加创建时间更新时间
            if($result){
                return back();
            }else{
                return back()->withErrors('图片保存失败,请重试');
            }
        }
    }

    //删除图片
    public function photosDel(Request $request){
        if(!$request->has('ids')){
            return response()->json(['status'=>'n','content'=>'图片不存在']);
        }
        $ids=explode(',',$request->ids);
        $res=Images::whereIn('id',$ids)->update(
            ['status'=>0,'updated_at'=>now()]
        );
        if($res!==false){
            return response()->json(['status'=>'y','content'=>'删除成功']);
        }else{
            return response()->json(['status'=>'n','content'=>'删除失败']);
        }

    }

    //会员基本资料
    public function info(){
        $info=Auth::guard('home')->user();
        $configs=config('mydataset');
        $provinces=Citys::where('parent_id','=',0)->select('id','name')->get();
        $dateshtml='';
        if($info->date!=='00'){
            $default=$info->date;
            $dateshtml=getmydate($info->year,$info->month,$default);
        }
        return view('Member.menberinfo',compact('info','configs','provinces','dateshtml'));
    }

    //会员资料保存
    public function infostore(Request $request){
        $input=$request->except('_token','_method');
        //规则验证
        $rules=[
            'qq'=>[
                'regex:/\d+/','nullable'
            ],
            'monologue'=>'min:10|max:300|nullable'
        ];
        $messages=[
            'qq.regex'=>'QQ格式不正确',
            'monologue.min'=>'内心独白至少10个字',
            'monologue.max'=>'内心独白最多300个字',
        ];
        $validate=validator($input,$rules,$messages);
        if($validate->fails()){
            $message=$validate->errors()->messages();
            return back()->withErrors($message);
        }
        $mid=Auth::guard('home')->id();
        $member=Members::find($mid);
        foreach ($input as $key=>$value){
            $member->$key=$value;
        }
        $result=$member->save();  //会自动完成修改时间
        if($result){
            return back();
        }else{
            return back()->withErrors('保存失败');
        }
    }

    //择偶条件展示页
    public function spouseview(){
        $mid=Auth::guard('home')->id();
        $info=Spouse::where('mid','=',$mid)->first();
        $provinces=Citys::where('parent_id',0)->get();
        $parent_id=0;
        $citys=[];
        if($info->city!=0){
            $parent_id=Citys::where('id','=',$info->city)->value('parent_id');
            $citys=Citys::where('parent_id','=',$parent_id)->get();
        }
        $configs=config('mydataset');
        return view('Member.spouseview',compact('info','configs','provinces','parent_id','citys'));
    }

    //择偶条件保存
    public function spousestore(Request $request){
        $input=$request->except('_token');
        $mid=Auth::guard('home')->id();
        $info=Spouse::where('mid','=',$mid)->first();
        foreach ($input as $key=>$value){
            $info->$key=$value;
        }
        $res=$info->save();
        if($res){
            return back();
        }else{
            return back()->withErrors('保存失败');
        }
    }

    //遇见页面
    public function meet(){
        $tags=config('meetag');
        $citys=Citys::where('parent_id','=',0)->get();
        $configs=config('mydataset');
        $data=Members::where('status','=',1)->inRandomOrder()->offset(0)->limit(15)->get();
        return view('Member.meet',compact('tags','citys','configs','data'));
    }

    //遇见搜索页面
    public function meetsearch(Request $request){
        $input=$request->all();
        $different=$input['different'];
        unset($input['different']);
        $tags=$input['tags'];
        unset($input['tags']);

        //标签条件组组成
        $tagconfigs=config('meetag');
        $tagconf=array_values($tagconfigs);//只获取值
        $where='1=1';
        foreach ($tags as $ke=>$tag){
            if(!is_null($tag)){
                $tmp=explode(',',$tag);
                foreach ($tmp as  $val){
                    $where.=' and find_in_set('.$val.','.$tagconf[$ke][0].')';
                }
            }
        }
        //筛选条件组成
        $wh=[
            ['status','=',1]
        ];
        foreach ($input as $key=>$value){
            if($value){  //排除不限的条件
                if($key=='minyear'){
                    $wh[]=['year','<=',$value];
                }elseif($key=='maxyear'){
                    $wh[]=['year','>=',$value];
                }else{
                    $wh[]=[$key,'=',$value];
                }
            }
        }

        if($different){
            $count=Members::where($wh)->whereRaw($where)->count();
            if($count>15){
                $data=Members::where($wh)->whereRaw($where)->inRandomOrder()->offset(0)->limit(15)->get();
            }else{
                return response()->json('');
            }
        }else{
            $data=Members::where($wh)->whereRaw($where)->inRandomOrder()->offset(0)->limit(15)->get();
        }

        //通过模型查询出来的数据是一个   Elequent模型  数据模型对象，不能直接当成数组使用
        $html='';
        $dataset=config('mydataset');
        if($data){
            foreach ($data as $value){
                $html.='<li dataid="'.$value->id.'" onclick="details(this)" class="persons">';
                if($value->avators){
                    $html.='<img src="'.$value->avators->path.'"/>';
                }else{
                    $html.='<img src="/Home/img/nopic.jpg"/>';
                }
                $age=date('Y') - $value->year;
				$html.='<p><b>'.$value->nickname.'</b>
                                <span>'.$age.'岁</span>
                                <span>'.getNameById($value->city).'</span>
                                <span>'.$dataset['hign_types'][$value->hign].'cm</span>
                                <span>'.$dataset['educations'][$value->education].'</span>
                                <span>'.$dataset['salarys'][$value->salary].'</span>
							</p>
						</li>';
            }
        }
        return response()->json($html);
    }

    public function meetlover(Request $request){
        $input=$request->all();
        $id=$input['id'];
        $mid=auth('home')->id();
        $lover=Members::where('id','=',$mid)->value('lover');
        $newvalue='';
        if($lover){
            //判断当前会员ID是否在$lover中
            $tmp=explode(',',$lover);
            if(!in_array($id,$tmp)){
                $newvalue=$lover.','.$id;
            }
        }else{
            $newvalue=$id;
        }
        if($newvalue==''){   //判断是否已经喜欢过了
            return response()->json(['status'=>'y','content'=>'喜欢成功']);
        }else{
            $res=Members::where('id','=',$mid)->update(
                ['lover'=>$newvalue]
            );
            if($res){
                return response()->json(['status'=>'y','content'=>'喜欢成功']);
            }else{
                return response()->json(['status'=>'n','content'=>'喜欢失败']);
            }
        }
    }

    //会员详情（前台）
    public function  personalinfo($id){
        $info=Members::where('status','=',1)->find($id);  //会员信息
        $images=$info->images;  //通过关联方法获取相册信息
        $spouses=$info->spouse;  //通过关联方法获取择偶信息
        $configs=config('mydataset');//数据配置信息
        $tagconfigs=config('meetag'); //标签配置信息
        $tags=[];
        foreach ($tagconfigs as $key=>$tagconfig)
        {
            $tmp=explode(',',$info[$tagconfig[0]]);

            $tags[$key]=array_filter($tmp,function($value){
                if($value==="" || $value===false || $value===null){
                    return false;
                }else{
                    return true;
                }
            });

        }
        return view('Member.personinfo',compact('tags','info','images','configs','tagconfigs','spouses'));
    }

    //会员打标签
    public function sticktag(Request $request){
        $id=$request->id;// 接收标签索引信息
        $mid=$request->mid; //接收对象会员ID
        $title=$request->title;
        $tagconfigs=config('meetag'); //获取标签配置信息
        $field=$tagconfigs[$title][0];  //获取标签对应的字段
        $oldtags=Members::where('id','=',$mid)->value($field); //获取已有的标签信息
        $newtags=[];
        if($oldtags){   //如果对应的字段已经有标签信息存在
            $newtags=explode(',',$oldtags);
            if(in_array($id,$newtags)) return response()->json(['status'=>'n','content'=>'英雄所见略同!']);
            array_filter($newtags,function($value){  //过滤掉空字符串、false和空值
                if($value==="" || $value===false || $value===null)  return false;
                return true;
            });
        }
        $newtags[]=$id;
        $newtagstr=implode(',',$newtags);
        $res=Members::where('id','=',$mid)->update([$field=>$newtagstr]);
        if($res) return response()->json(['status'=>'y','content'=>'']);
        return response()->json(['status'=>'n','content'=>'打标签失败']);
    }
}
