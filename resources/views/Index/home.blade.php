@extends('Common.homebase')
@section('head')
{!! $title !!}
	<link rel="stylesheet" href="/Home/css/home.css" />
@endsection
		<!--头部开始-->
@section('header')
	@include('Common.header');
	@include('Common.nav',['_selected_'=>'index'])
@endsection
		<!--头部结束-->
		<!--轮播图开始-->
@section('carousel')
	@parent
		<section id="carousel">
			<ul>
				@forelse($carousel as $value)
				<li class="carousel"><a href=""><img src="{{ $value }}"/></a></li>
				@empty
					轮播图不存在
				@endforelse
			</ul>
			<ol id="carouselc">
				@for($i=0;$i<3;$i++)
					{{--@if($i>2)
						@break
						@continue
					@endif--}}
				<li class="carousel-circle">{{$i}}</li>
				@endfor
			</ol>
		</section>
		<!--轮播图结束-->
@endsection
@section('content')
		<!--推荐开始-->
		<section id="meetyoubigbox">
			<section id="meetyoubox">
				<p id="meetyoutitle">千里有缘来相会</p>
				<p id="meetyousort"><a href="javascript:;">推荐</a><a href="javascript:;">优男</a><a href="javascript:;">优女</a></p>
				<ul id="meetyouusers">
					<li>
						<a class="meetuser" href="">
							<img src="/Home/img/person/lisa.jpg"/>
							<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>希望在这里能有缘找到一个情投意合的人共度一生。可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
						</a>
					</li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/会员1.png"/>
							<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div></a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/你会懂.jpg"/>
							<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/嗯哼.jpg"/>
							<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/初晴.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/宽屏少女.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/文儿.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/豆豆得儿.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/欧欧.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
					<li><a class="meetuser" href=""><img src="/Home/img/person/葬墨.jpg"/>
					<div class="meetyoudetail">
								<p>lisa</p>
								<p><span>25岁</span><span>长沙岳麓</span><span>未婚</span><span>160CM</span></p>
								<p><span>内心独白:</span>我是一个阳光开朗的长沙姑娘，热爱生活心地善良，喜欢旅游、美食和一切美好的事物。目前在长沙一家设计师服装品牌任销售主管，收入尚可。平时的休闲活动就是追追美剧看看书，陪伴家人。朋友对我的评价是踏实稳重不出风头，我对自己的要求是做好自己。桃李不言下自成蹊，于人于事皆如此。由于工作局限，我的交友圈大部分都是女生，这几年也忙于工作，一直没有遇到心仪的对象，希望在这里能有缘找到一个情投意合的人共度一生。希望他阳光开朗积极上进，有责任心看重家庭，拒绝酗酒赌博泡夜店暴脾气者，不要啃老族和妈宝男，然后也没想过当后妈。拒绝不正当的各类龌龊勾当，请自重，否则我会投诉你到封号！如果你觉得我符合你的条件，可以多联系我几次，我不会和机器人对话浪费时间，谢谢！</p>
							</div>
					</a></li>
				</ul>
			</section>
		</section>
		<!--推荐结束-->
		<!--
        	作者：chenke
        	时间：2018-04-09
        	描述：线下交友
        -->
		<section id="undeline-friends">
			<section id="undeline-box">
				<p id="underline-title"><b>线下交友活动：</b>零距离接触亲密约会，寻找有缘的那个TA</p>
				<div id="actives-box">
					<ul id="details-box">
						<li>
							<a href="activedetail.html" class="active-detail">
								<img src="/Home/img/actives/active1.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
								<div class="active-tab1"></div>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active2.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
								<div class="active-tab2"></div>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active3.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active4.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active5.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active6.png"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active7.png"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active8.jpg"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
						<li>
							<a href="" class="active-detail">
								<img src="/Home/img/actives/active9.png"/>
								<p>【花漾四月 品茗结缘】画院茶坊公益相亲交友派</p>
								<p>
									<span>成都市</span><span>免费</span><span>2018/04/10</span>
									<button type="button">立即报名</button>
								</p>
							</a>
						</li>
					</ul>
				</div>
				<div class="toleft"></div>
				<div class="toright"></div>
			</section>
		</section>
		<!--成功案例开始-->
		<section id="letsmarry">
			<section id="marrytitle">
				<p class="marry-declaration">--------------------终于遇见你，我们结婚吧!--------------------</p>
				<p class="love-users"><i class="lover"></i>他们相爱啦！ 已经有<b>168203</b>人在"只为遇见你"找到了另一半<i class="lover"></i></p>
			</section>
			<section id="marrycases">
				<div>
					<div class="casebox case1">
						<ul class="cases">
							<li><a href=""><img src="/Home/img/person/love1.jpg"/></a></li>
							<li><a href=""><img src="/Home/img/person/love2.jpg"/></a></li>
						</ul>
					</div>
					<div class="casebox">
						<ul class="cases">
							<li><a href=""><img src="/Home/img/person/love3.jpg"/></a></li>
							<li><a href=""><img src="/Home/img/person/love4.png"/></a></li>
						</ul>
					</div>
					<div class="casebox">
						<div class="casedan">
							<a><img src="/Home/img/person/love5.jpg"/></a>
						</div>
					</div>
					<div class="casebox">
						<ul class="cases">
							<li><a href=""><img src="/Home/img/person/love6.jpg"/></a></li>
							<li><a href=""><img src="/Home/img/person/love7.jpg"/></a></li>
						</ul>
					</div>
					<div class="casebox">
						<div class="casedan">
							<a><img src="/Home/img/person/love8.jpg"/></a>
						</div>
					</div>
					<div class="casebox">
						<ul class="cases">
							<li><a href=""><img src="/Home/img/person/love9.jpg"/></a></li>
							<li><a href=""><img src="/Home/img/person/love10.jpg"/></a></li>
						</ul>
					</div>
					<div class="casebox">
						<ul class="cases">
							<li><a href=""><img src="/Home/img/person/love11.jpg"/></a></li>
							<li><a href=""><img src="/Home/img/person/love13.jpg"/></a></li>
						</ul>
					</div>
				</div>
			</section>
		</section>
		<!--成功案例结束-->
@endsection
@section('javascript')
	<script type="text/javascript">
		$(function(){
			//轮播效果开始
			var i=0,len=$(".carousel").length;
			setInt=setInterval(function(){
				carousel(i,len)
				i++;
				if(i>=len){
					i=0;
				}
			},3000);
			$(".carousel-circle").hover(function(){
				clearInterval(setInt);
				var t=$(this).html();
				$(".carousel").eq(t).slideDown().siblings().slideUp();
				$(this).css('background','yellow').siblings().css('background','mediumvioletred');
			},function(){
				i=$(this).html();
				setInt=setInterval(function(){
					carousel(i,len)
					i++;
					if(i>=len){
						i=0;
					}
				},3000);
			})
			function carousel(i,len){
				$(".carousel").eq(i).slideDown().siblings().slideUp();
				$(".carousel-circle").eq(i).css('background','yellow').siblings().css('background','mediumvioletred');
			}
			//轮播结束
			//推荐详情效果
			$(".meetuser").hover(function(){
				$(this).children(".meetyoudetail").slideDown();
			},function(){
				$(this).children(".meetyoudetail").slideUp();
			})
			//交友滚动效果
			var movenum=0,movelen=$("#details-box>li").length;
			$(".toleft").click(function(){
				movenum--;
				if(movenum<0){
					movenum=movelen-3;
				}
				var move=33.3 * movenum;
				$("#details-box").animate({left:'-'+move+'%'});
			})
			$(".toright").click(function(){
				movenum++;
				if(movenum>movelen-3){
					movenum=0;
				}
				var move=33.3 * movenum;
				$("#details-box").animate({left:'-'+move+'%'});
			})
		})
	</script>
@endsection
