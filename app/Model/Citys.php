<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    //对应的数据表
    protected  $table="citys";

    //不可填充数据
    protected  $guarded=[];

   /* //可填充
    protected  $fillable=[];*/

}
