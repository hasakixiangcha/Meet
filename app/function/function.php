<?php
/**
 * 自定义辅助函数
 */
//获取日期
function getmydate($year,$month,$default=0){
    $str='';
    $max=[1,3,5,7,8,10,12];
    $arr=range(1,28);
    foreach ($arr as $value){
        if($default==$value){
            $str.='<option selected  value="'.$value.'">'.$value.'</option>';
        }else{
            $str.='<option  value="'.$value.'">'.$value.'</option>';
        }
    }
    if($month==2){
        if($year%4){

        }else{
            if($default==29){
                $str.='<option selected value="29">29</option>';
            }else{
                $str.='<option value="29">29</option>';
            }
        }
    }else{
        for ($i=29;$i<=30;$i++){
            if($default==$i){
                $str.='<option selected value="'.$i.'">'.$i.'</option>';
            }else{
                $str.='<option value="'.$i.'">'.$i.'</option>';
            }
        }
        if(in_array($month,$max)){
            if($default==31){
                $str.='<option selected value="31">31</option>';
            }else{
                $str.='<option value="31">31</option>';
            }

        }
    }
    return $str;
}
//根据地址ID或去地址名称
function getNameById($id){
    if($id==0){
        return "未知";
    }else{
        return \Illuminate\Support\Facades\DB::table('citys')->where('id','=',$id)->value('name');
    }
}