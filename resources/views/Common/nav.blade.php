<nav id="navication">
    <div id="navication-box">
        <div id="navlogo">
            <img src="/Home/img/logo.png" />
        </div>
        <ul id="navicates">
            <li><a href="{{url('/Index')}}" @if($_selected_=='index') class="hoverclass" @endif >首&nbsp;&nbsp;&nbsp;&nbsp;页</a></li>
            <li><a href="{{url('/Member/meet')}}" @if($_selected_=='meet') class="hoverclass" @endif >遇&nbsp;&nbsp;&nbsp;&nbsp;见</a></li>
            <li><a href="{{url('/Shop')}}" @if($_selected_=='shop') class="hoverclass" @endif >恋爱商城</a></li>
            <li><a href="{{url('/Member')}}" @if($_selected_=='center') class="hoverclass" @endif> 个人中心</a></li>
        </ul>
        <p id="server-call">服务热线:520-521-1314</p>
    </div>
</nav>