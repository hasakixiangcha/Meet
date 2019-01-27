@extends('Common.homebase')
@section('head')
		<title>首页</title>
		<link rel="stylesheet" href="/Home/css/register.css" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('header')
			<header id="head">
				<div id="top">
					<p id="top-text">
						<span class="top-text-left">欢迎访问“只为遇见你”婚恋网！服务时间（无假日）9:00-21:00</span>
						<span class="top-text-right"><a href="{:U('index')}">登录</a><i>|</i><a href="">在线咨询</a></span>
					</p>
				</div>
			</header>
@endsection
@section('content')
			<section id="regbox">
				<form action="/Index/store"  method="post">
					{{ csrf_field() }}
					<h1 id="infotitle">欢迎注册“只为遇见你”网</h1>
					<ul id="infobox">
						<li class="infoline">
							<p class="infoleft"><span class="require">*</span>昵称：</p>
							<p class="inforight"><input value="{{old('nickname')}}" class="inputtype" type="text" name="nickname"/><span class="tips">@if($errors->first('nickname')) {{$errors->first('nickname')}} @endif  </span></p>
						</li>
						<li>
							<p class="infoleft"><span class="require">*</span>头像：</p>
							<div class="inforight-img">
						  		<input type="hidden"  id="picurl" name="avator" value="{{old('avator')}}"/>
						     	<img class="imgbtn"  onclick="selectimg()" id="thumb_url" @if(old('avator')) src="{{old('avator')}}" @else src='/Home/img/nopic.jpg' @endif >
						     	<span class="tips">建议268px*268px</span>
					     	</div>
						</li>
						<li class="infoline">
							<p class="infoleft"><span class="require">*</span>手机：</p>
							<p class="inforight"><input class="inputtype" value="{{old('account')}}" type="text" name="account" /><span class="tips">@if($errors->first('account')) {{$errors->first('account')}} @endif</span></p>
						</li>
						<li class="infoline">
							<p class="infoleft"><span class="require">*</span>登录密码：</p>
							<p class="inforight"><input class="inputtype" value="{{old('password')}}" type="password" name="password"/><span class="tips">@if($errors->first('password')) {{$errors->first('password')}} @endif</span></p>
						</li>
						<li class="infoline">
							<p class="infoleft"><span class="require">*</span>确认密码：</p>
							<p class="inforight"><input class="inputtype" value="{{old('password_confirmation')}}" type="password" name="password_confirmation"/><span class="tips"></span></p>
						</li>
						<li class="infoline">
							<p class="infoleft-hign">内心独白：</p>
							<div class="inforight-hign">
								<textarea name="monologue" class="textareainfo">{{old('monologue')}}</textarea>
							</div>
						</li>
						<li class="infoline">
							<p class="infoleft"><span class="require">*</span>择偶性别：</p>
							<p class="inforight">
									<label class="radio"><input name="selectsex" type="radio" value="1"/>男</label>
									<label class="radio"><input name="selectsex" type="radio" value="0" checked/>女</label>
							</p>
						</li>
						<li class="infoline">
							<p class="subline"><input class="inputsubmit" type="submit" value="注&nbsp;&nbsp;&nbsp;册"/></p>
						</li>
					</ul>
				</form>
			</section>
@endsection
@section('javascript')
	<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
	<!-- 单图片上传 -->
	<link rel="stylesheet" href="/lib/kindeditor/themes/default/default.css" />
	<script src="/lib/kindeditor/kindeditor.js"></script>
	<script src="/lib/kindeditor/lang/zh_CN.js"></script>
	<script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var editor='';
		KindEditor.ready(function(K) {
			 editor= K.editor({
			    allowFileManager : true,  //     
			    uploadJson : "/uploadimg", //上传功能
			    fileManagerJson : "/Admin/lib/kindeditor/php/file_manager_json.php", //网络空间
			  });
		});
		////上传头像
		function selectimg(){
		  editor.loadPlugin('image', function() {
		    editor.plugin.imageDialog({
		    	showRemote : false, //网络图片开启
		    	//showLocal : false, //不开启本地图片上传
		        clickFn : function(url, title, width, height, border, align) {
		        	$('#picurl').val(url);
			        $('#thumb_url').attr("src",url);
			        editor.hideDialog();
		      }
		    });
		  });
		}
		
	</script>
@endsection

