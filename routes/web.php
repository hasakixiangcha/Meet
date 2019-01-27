<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','Index\Index@index');  //主页
Route::post('/getcitynext',"Controller@getCityNext");//省市二级联动
Route::post('/startandstop',"Controller@startAndStop");//启用和停用
Route::post('/getmydate',"Controller@getMyDate");//获取日期
Route::post('/deleteall',"Controller@deleteAll");//批量删除
Route::post('/uploadimg','Controller@uploadImg');   //图片上传
Route::prefix('Index')->namespace('Index')->group(function(){
    Route::get('/','Index@home');  //首页
    Route::get('/login','Index@login');  //登陆展示页
    Route::post('/loginauth','Index@loginauth'); //登录验证方法
    Route::get('/register','Index@register');  //注册展示页
    Route::post('/store','Index@store');//注册保存数据的路由
    Route::get('/logout','Index@logout');//退出
});
Route::prefix('Admin')->namespace('Admin')->group(function(){
    Route::get('/','Index@index');
    Route::get('/welcome','Index@welcome');
});

Route::prefix('Shop')->namespace('Shop')->group(function(){
    Route::get('/','Shop@index');
});
Route::prefix('Member')->namespace('Member')->group(function(){
    Route::get('/',"Member@index");
    Route::get('/photos','Member@photos');
    Route::get('/info','Member@info');
    Route::post('/photosAdd','Member@photosAdd');
    Route::get('/spouseview','Member@spouseview');
    Route::post('/spousestore','Member@spousestore');
    Route::post('/photosDel','Member@photosDel');
    Route::put('/infostore','Member@infostore');
    Route::get('/adminlist','Admin@adminlist');
    Route::get('/membershow/{id}','Admin@show')->where(['id'=>'\d+']);
    Route::get('/{id}/edit/','Admin@edit')->where(['id'=>'\d+']);
    Route::post('/update/{id}','Admin@update')->where(['id'=>'\d+']);
    Route::get('/personalinfo/{id}','Member@personalinfo')->where(['id'=>'\d+']);
    Route::post('/sticktag','Member@sticktag'); //给会员打标签
    Route::get('/meet','Member@meet');
    Route::get('/exportview','Admin@exportview');
    Route::get('/importview','Admin@importview');
    Route::post('/import','Admin@import');
    Route::post('/export','Admin@export');
    Route::post('/meetsearch','Member@meetsearch');
    Route::post('/meetlover','Member@meetlover');
});