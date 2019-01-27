<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authtable;

class Members extends Authtable
{
    //指定关联数据表
    protected $table="members";
    //指定可填充数据
   // protected $fillable=['account','password'];
    //指定不可填充数据
    protected $guarded =[];

    //重置验证账号字段
    public function username(){
        return 'account';
    }

    //关联图片表的头像
    public function avators(){
        return $this->hasOne('App\Model\Images','id','avator')
            ->where('status','=',1)->select('path');
    }

    //关联图片表
    public function images(){
        return $this->hasMany('App\Model\Images','tableid','id')
            ->where([
                    ['status','=',1],['type','=',0]
                ])
            ->select('id','path','title');
    }

    //关联择偶信息
    public function spouse(){
        return $this->hasOne('App\Model\Spouse','mid','id');
    }
}
