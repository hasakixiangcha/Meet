@extends('Common.homebase')
@section('head')
		<title>只为遇见你-登录页</title>
		<link rel="stylesheet" href="/Home/css/login.css" />
@endsection
@section('header')
	<header>
		<div id="header">
			<img class="logopng" src="/Home/img/logo.png" />
			<img class="logotxtpng" src="/Home/img/logo_txt.png" />
		</div>
	</header>
@endsection
@section('content')
	<form action="/Index/loginauth" method="post">
		{{csrf_field()}}
		<div id="logincontent">
			<div class="login-box">
				<div class="loginform-box">
					<p class="logintext">会员登录</p>
					<div class="formcontent">
						<p class="input-cont">
							<span>登录账号</span><input name="account" class="logincont" @if(old('account')) value="{{old('account')}}" @endif @if(session('account')) value="{{session('account')}}"  @endif type="text" placeholder="手机号" />
						</p>
						<p class="input-cont">
							<span>密&nbsp;&nbsp;&nbsp;&nbsp;码</span><input name="password" class="logincont" @if(old('password')) value="{{old('password')}}" @endif  @if(session('password')) value="{{session('password')}}"  @endif type="password" placeholder="密码" />
						</p>
						<p class="input-auto">
							<span></span><label><input name="remember" value="1" type="checkbox" @if(old('remember')) checked @endif >两周内自动登录</label>
						</p>
						<p class="input-bnt">
							<button>登录</button><a href="#">忘记密码</a>
						</p>
						<p class="input-auto" style="text-align: center">
							@foreach($errors->all()  as $error)
							<b style="color:red;font-size:14px;">{{$error}}</b><br/>
							@endforeach
						</p>
						<p class="login-register">
							<a href="{{url('/Index/register')}}">还不是会员，立即注册</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection
@section('javascript')
@endsection
