<!-- 左边开始-->
<aside id="personnavicates">
    <section id="headportrait">
        <div class="portraitbox">
            <img @if(auth('home')->user()->avators) src="{{auth('home')->user()->avators->path}}" @else src="/Home/img/avatar/noavatar.jpg" @endif />
        </div>
        <p class="portraitname"><span>{{auth('home')->user()->nickname}}</span><em>{{auth('home')->user()->account}}</em></p>
        <p class="portraitprove"><a class="proved" title="手机验证" href=""></a><a title="身份证验证" href=""></a><a title="邮箱验证" href=""></a></p>
    </section>
    <p class="balance-recharge">
						<span class="balance">余额
						<span class="balance-money">￥<b>{{auth('home')->user()->balance}}</b></span>
						</span>
        <button class="recharge">
            充值
            <a class="torecharge" href="">去充值</a>
        </button>
    </p>
    <ul class="personalcatetogrys">
        <li>
            <a href="/Member" @if(!isset($aside)) class="navicatehover" @endif >购物车</a>
        </li>
        <li>
            <a href="/Member/info/"  @if(isset($aside)&&$aside=='base') class="navicatehover" @endif >基本资料</a>
        </li>
        <li>
            <a href="/Member/photos" @if(isset($aside)&&$aside=='photos') class="navicatehover" @endif >我的相片</a>
        </li>
        <li>
            <a href="/Member/spouseview" @if(isset($aside)&&$aside=='spouse') class="navicatehover" @endif >择偶条件</a>
        </li>
        <li>
            <a href="proveinfo.html" @if(isset($aside)&&$aside=='prove') class="navicatehover" @endif >认证信息</a>
        </li>
        <li>
            <a href="mygifts.html" @if(isset($aside)&&$aside=='gifts') class="navicatehover" @endif >我的礼物</a>
        </li>
        {{--<li>
            <a href="myaccost.html">话题自荐</a>
        </li>--}}
        <li>
            <a href="mylove.html" @if(isset($aside)&&$aside=='loves') class="navicatehover" @endif >我的喜欢</a>
        </li>
        <li>
            <a href="myinterview.html" @if(isset($aside)&&$aside=='interview') class="navicatehover" @endif >我的访客</a>
        </li>
        <li>
            <a href="myrecord.html" @if(isset($aside)&&$aside=='records') class="navicatehover" @endif >消费记录</a>
        </li>
        <li>
            <a href="mysysset.html" @if(isset($aside)&&$aside=='settings') class="navicatehover" @endif >个人设置</a>
        </li>
    </ul>
</aside>
<!--左边结束-->