<?php

namespace App\Http\Controllers\Member;

use App\Exports\MembersExport;
use App\Imports\MemberImport;
use App\Model\Members;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Excel;

class Admin extends Controller
{
    //会员列表
    public function adminlist(Request $request){
        $gets=$request->only('account','starttime','endtime');
        $where=[];
        if(isset($gets['account'])){
            $where[]=['account','like','%'.$gets['account'].'%'];
        }
        if(isset($gets['starttime'])){
            $where[]=['created_at','>',$gets['starttime']];
        }
        if(isset($gets['endtime'])){
            $where[]=['created_at','<=',$gets['endtime']];
        }
        $data=Members::select('id','nickname','avator',
            'account','sex','balance','year','province',
            'city','district','status','created_at',
            'last_login_time')->where($where)->paginate(10);

        return view('Member.memberlist',compact('data','gets'));
    }

    //会员详情
    public function show($id){
        $data=Members::select('id','sex','nickname','avator','marray_status','education','has_child',
        'industry','monologue','qq','weixin','hign','month','date','house_cond','nation','salary')->find($id);
        $configs=config('mydataset');
        return view('Member.membershow',compact('data','configs'));
    }

    //会员编辑
    public function edit($id){
        $info=Members::select('account','monologue','id')->find($id);
        return view('Member.memberedit',compact('info'));
    }

    //会员数据更新
    public function update(Request $request,$id){
        $update=['monologue'=>$request->monologue?$request->monologue:''];
        if($request->password){
            if(preg_match('/([a-zA-Z]+\d+)|(\d+[a-zA-Z]+)/',$request->password)){
                $update['password']=bcrypt($request->password);
            }else{
                return response()->json(['status'=>'n','conten'=>'密码格式不正确']);
            }
        }
        $update['updated_at']=date('Y-m-d H:i:s');
        try{
            $res=Members::where('id',$id)->update(
                $update
            );
        }catch (\Exception $exception){
            $error=$exception->getMessage();
            return response()->json($error);
        }
        if($res){
            return response()->json(['status'=>'y','content'=>'更新成功']);
        }else{
            return response()->json(['status'=>'n','content'=>'更新失败']);
        }
    }

    //导出展示页
    public function exportview(){
        return view('Member.export');
    }

    //导出执行页面
    public function export(Request $request){
        $filename=$request->filename;
        $arr=config('excelfields.Members');
        $title=array_flip($arr);
        ksort($title);
       //
        $fields=implode(',',$arr);
        $data=Members::selectRaw($fields)->offset(0)->limit(1000)->get()->toArray();
        foreach ($data as &$val){
            ksort($val);
        }

        $data=array_prepend($data,$title);

        $excelmode=new MembersExport($data);
        $filename.='.xlsx';
        return $excelmode->download($filename,\Maatwebsite\Excel\Excel::XLSX);
    }

    //导入展示页
    public function importview(){
        return view('Member.import');
    }
    //导入执行方法
    public function import(Request $request){
        if($request->hasFile('fileexcel')){
            $input=$request->file('fileexcel');
            if($input->isValid()){
                $path=$input->store('Import');
                if(ends_with($path,'.xlsx') || ends_with($path,'.xlx') ){
                    $model=new MemberImport();
                    $model->import($path);
                    return back();
                }else{
                    return response()->withError('文件不正确');
                }

            }else{
                return response()->withError('文件上传失败');
            }

        }else{
            return response()->withError('文件不存在');
        }


    }
}
