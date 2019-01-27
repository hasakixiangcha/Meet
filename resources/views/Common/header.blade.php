<header id="head">
    <div id="top">
        <p id="top-text">
            <span class="top-text-left">欢迎访问“只为遇见你”婚恋网！服务时间（无假日）9:00-21:00</span>
            <span class="top-text-right">
                @auth('home')
                    <a href="javascript:;">{{auth('home')->user()->nickname}}</a><i>|</i>
                    <a href="/Index/logout">退出</a><i>|</i>
                @endauth
                @guest('home')
                <a href="{{url('/Index/login')}}">登录</a><i>|</i><a href="{{url('/Index/register')}}">注册</a><i>|</i>
                @endguest
                <a href="">在线咨询</a>
            </span>
        </p>
    </div>
</header>