@extends('Common.homebase')
@section('head')
<title>恋爱商城</title>
<link rel="stylesheet" href="/Home/css/shop.css" />
@endsection
@section('header')
		@parent
		@include('Common.nav',['_selected_'=>'shop'])
@endsection
@section('carousel')
		<!-- 轮播图开始 -->
		<section id="shopcarouselbox">
				<ul>
					<li class="shopcarousel"><a href=""><img src="/Home/img/shop/banner1.jpg"/></a></li>
					<li class="shopcarousel"><a href=""><img src="/Home/img/shop/banner2.jpg"/></a></li>
					<li class="shopcarousel"><a href=""><img src="/Home/img/shop/banner3.jpg"/></a></li>
				</ul>
				<ol id="shopcarouselc">
					<li class="shopcarousel-circle">0</li>
					<li class="shopcarousel-circle">1</li>
					<li class="shopcarousel-circle">2</li>
				</ol>
		</section>
@endsection
@section('content')
		<!-- 分类开始-->
		<section id="categorybox">
			<section id="categorys">
				<a target="_blank" href="{:U('goods/shop',array('cate'=>0))}">送女神</a>
				<a target="_blank" href="">送女友</a>
				<a target="_blank" href="">送老婆</a>
				<a target="_blank" href="">送男神</a>
				<a target="_blank" href="">送男友</a>
				<a target="_blank" href="">送老公</a>
			</section>
		</section>
		<!--分类结束-->
		<!--商品开始-->
		<section id="goodsbigbox">
			<section id="goodsbox">
				<ul>
					<li class="goodsli">
						<a class="goods" href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods1.jpg" />
								<div class="goodstag">定制</div>
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods"  href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods2.jpg" />
								<div class="goodstag">刻字</div>
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods" href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods3.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods" href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods4.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods" href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods5.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods" href="goodsdetail.html">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods6.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods7.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
					<li class="goodsli">
						<a class="goods">
							<div class="goodsimg">
								<img src="/Home/img/shop/goods8.jpg" />
							</div>
							<p class="goodstitle">阳光罐 存储阳光的罐子</p>
							<p class="goodsintro">￥<span>68.00</span><em><b>50</b>个款式</em></p>
						</a>
					</li>
				</ul>
			</section>
		</section>
		<!--商品结束-->
@endsection
@section('javascript')
<script type="text/javascript">
	$(function(){
		//轮播图开始
		var i=0,len=$(".shopcarousel").length;
		index=setInterval(function(){
				$(".shopcarousel").eq(i).fadeIn(500).siblings().fadeOut(500);
				$(".shopcarousel-circle").eq(i).css('background','yellow').siblings().css('background','mediumvioletred');
				i++;
				if(i>=len){
					i=0;
				}
		},3000)
		$(".shopcarousel-circle").hover(function(){
				clearInterval(index);
				var t=$(this).html();
				$('.shopcarousel').eq(t).fadeIn().siblings().fadeOut();
				$(this).css('background','yellow').siblings().css('background','mediumvioletred');
		},function(){
			 	i=$(this).html();
			 	index=setInterval(function(){
			 		i++;
			 		if(i>len){
						i=0;
					}
					$(".shopcarousel").eq(i).fadeIn(500).siblings().fadeOut(500);
					$(".shopcarousel-circle").eq(i).css('background','yellow').siblings().css('background','mediumvioletred');
				},3000)
		})
		//轮播图结束
		
	})
</script>
@endsection