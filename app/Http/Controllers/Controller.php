<?php

namespace App\Http\Controllers;
use App\Model\Citys;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function uploadImg(Request  $request){
        if($request->hasFile('imgFile')){
            $data=$request->file('imgFile');   //接收文件信息并准备上传
        }
        if($data->isValid()) {   //判断文件是否上传成功
            $path = $data->store('avators');//保存到项目中自动生成文件名
            $res = [
                'url' =>'/storage/'.$path,  //权限
                'error' => 0,
                'message' => '上传成功'
            ];
            return response()->json($res);
        }
    }

    /**
     * @param $img  图片地址  /storage/avators/文件名
     * @param $width 缩略之后的图片的宽度
     * @param $height 缩略之后的图片的高度
     * @param int $water  是否加上水印
     */
    public function handleImg($img,$width,$height,$water=0){
        $imagepath=$this->getImagePath();
        $tmpavator=str_after($img,$imagepath['prefix']);
        $path=$imagepath['root'].$tmpavator;
        $realpath=preg_replace('/\//','\\',$path);
        if(!file_exists($realpath)){
            return false;
        }
        $imgmodel=Image::make($realpath);
        $resize=$imgmodel->resize($width,$height); //图片缩略
        if($water){
            $waterimg=public_path().'\water.png';
            $resize->insert($waterimg,'bottom-left',0,10);
        }
        $resize->save($realpath); //覆盖原来的图片
        return true;
    }

    public function getImagePath(){
        $default=config('filesystems.default');
        $root=config('filesystems.disks.'.$default.'.root');
        $url=config('filesystems.disks.'.$default.'.url');
        $tmpurl=str_after($url,env('APP_URL'));
        return ['root'=>$root,'prefix'=>$tmpurl];
    }

    //将base64编码图片数据还原成图片文件，并放在指定文件下
    public function base64_image_content($base64_image_content,$path=''){
        //匹配出图片的格式,返回匹配搜索到的数据$result
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
            $type = $result[2];//获取图片类型
            $imagepath=$this->getImagePath();
            $new_path =$imagepath['root'].'\\'.$path;
            $new_path=preg_replace('/\//','\\',$new_path);
            if(!is_dir($new_path)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                @mkdir($new_path,0777,true);
            }
            //创建图片文件
            $newfile = rtrim($new_path,'/').'\\'.date('YmdHis',time()).mt_rand(10000,99999).'.'.$type;
            //打开文件
            $file=fopen($newfile,'w') or die('图片不能创建，请重试');
            $str=base64_decode(str_replace($result[1], '', $base64_image_content));//将base64编码解码
            fwrite($file,$str);//写入图片内容
            fclose($file);//关闭文件
            $root=preg_replace('/\//','\\',$imagepath['root']);
            $finalpath=str_after($newfile,$root);
            $finalpath=$imagepath['prefix'].$finalpath;
            $finalpath=preg_replace('/\\\/','/',$finalpath);
            return $finalpath;
        }else{
            return false;
        }
    }


    //根据省份或城市选择下级内容
    public function getCityNext(Request $request){
        $id=$request->id;
        $str='<option value="0">城市</option>';
        if($id){
            $next=Citys::where('parent_id','=',$id)->select('id','name')->get();
            foreach ($next as $val){
                $str.='<option value="'.$val->id.'">'.$val->name.'</option>';
            }
        }
        return response($str);
    }

    //选择日期
    public function getMyDate(Request $request){
        $month=$request->month;
        $str='';
        $year=$request->year;
        $max=[1,3,5,7,8,10,12];
        $arr=range(1,28);
        foreach ($arr as $value){
            $str.='<option value="'.$value.'">'.$value.'</option>';
        }
        if($month==2){
            if($year%4){

            }else{
                $str.='<option value="29">29</option>';
            }
        }else{
            for ($i=29;$i<=30;$i++){
                $str.='<option value="'.$i.'">'.$i.'</option>';
            }
            if(in_array($month,$max)){
                $str.='<option value="31">31</option>';
            }
        }
        return response($str);
    }

    //列表页数据停用和启用
    public function startAndStop(Request $request){
        $data=$request->only('model','id','status');
        $res=DB::table($data['model'])->where('id','=',$data['id'])->update([
            'status'=>$data['status'],'updated_at'=>now()
        ]);
        if($res!==false){
            return response()->json(['status'=>'y','content'=>'操作成功']);
        }else{
            return response()->json(['status'=>'n','content'=>'操作失败']);
        }

    }
    //批量删除
    public function deleteAll(Request $request){
        $data=$request->only('model','ids');
        $ids=explode(',',$data['ids']);
        array_pop($ids);
        $res=DB::table($data['model'])->whereIn('id',$ids)->update([
            'status'=>0,'updated_at'=>now()
        ]);
        if($res!==false){
            return response()->json(['status'=>'y','content'=>'操作成功']);
        }else{
            return response()->json(['status'=>'n','content'=>'操作失败']);
        }
    }
}
