@extends('Common.homebase')
@section('head')
		<title>个人中心</title>
		<link rel="stylesheet" href="/Home/css/personal.css" />
@endsection
@section('header')
	@include('Common.header')
	@include('Common.nav',['_selected_'=>'center'])
@endsection
@section('content')
		<section id="personalbigbox">
			<section id="personalbox" class="clear">
				@include('Common.asidenav')
				<!--右边开始-->
				<section class="personalcatecontents">
					<section class="personalcatebox">
						<table class="goodslist">
							<tr>
								<th class="xuanze"><input type="checkbox" />全选</th>
								<th class="goodsimg">商品图片</th>
								<th class="goodsname">商品名称</th>
								<th class="goodspec">商品规格</th>
								<th class="goodsprice">单价</th>
								<th class="goodsnum">数量</th>
								<th class="totalmoney">金额</th>
								<th class="actions">操作</th>
							</tr>
							<tr class="goodsinfo">
								<td><input type="checkbox" /></td>
								<td>
								<a class="imgstyle" href="">
									<img src="/Home/img/shop/goods3.jpg" />
								</a>
								</td>
								<td>
								<a class="titlestyle" href="">生日礼物女生送女友朋友情人节玫瑰花创意走心的特别浪漫抖音热门</a>
								</td>
								<td>
								<div>竹简情书礼盒装</div>
								</td>
								<td>
								<div>
									<del>￥<span>228.00</span></del>
									<p>￥<span>168.00</span></p>
								</div>
								</td>
								<td>
								<div class="goodsnumstyle">
									<span>-</span>
									<input type="text" value="1"/>
									<span>+</span>
								</div>
								</td>
								<td>￥168.00000</td>
								<td>
									<a href="">喜欢</a><br />
									<a href="">删除</a>
								</td>
							</tr>
							<tr class="goodsinfo">
								<td><input type="checkbox" /></td>
								<td>
								<a class="imgstyle" href="">
									<img src="/Home/img/shop/goods3.jpg" />
								</a>
								</td>
								<td>
								<a class="titlestyle" href="">生日礼物女生送女友朋友情人节玫瑰花创意走心的特别浪漫抖音热门</a>
								</td>
								<td>
								<div>竹简情书礼盒装</div>
								</td>
								<td>
								<div>
									<del>￥<span>228.00</span></del>
									<p>￥<span>168.00</span></p>
								</div>
								</td>
								<td>
								<div class="goodsnumstyle">
									<span>-</span>
									<input type="text" value="1"/>
									<span>+</span>
								</div>
								</td>
								<td>￥168.00000</td>
								<td>
									<a href="">喜欢</a><br />
									<a href="">删除</a>
								</td>
							</tr>
							<tr class="goodsinfo">
								<td><input type="checkbox" /></td>
								<td>
								<a class="imgstyle" href="">
									<img src="/Home/img/shop/goods3.jpg" />
								</a>
								</td>
								<td>
								<a class="titlestyle" href="">生日礼物女生送女友朋友情人节玫瑰花创意走心的特别浪漫抖音热门</a>
								</td>
								<td>
								<div>竹简情书礼盒装</div>
								</td>
								<td>
								<div>
									<del>￥<span>228.00</span></del>
									<p>￥<span>168.00</span></p>
								</div>
								</td>
								<td>
								<div class="goodsnumstyle">
									<span>-</span>
									<input type="text" value="1"/>
									<span>+</span>
								</div>
								</td>
								<td>￥168.00000</td>
								<td>
									<a href="">喜欢</a><br />
									<a href="">删除</a>
								</td>
							</tr>
						</table>
					</section>
					<section class="sendbox">
						<button class="tosend">去赠送</button>
					</section>
				</section>
				<!--右边结束-->
			</section>
		</section>
@endsection
@section('javascript')
		<script type="text/javascript">
			$(function(){
				$(".balance").hover(function(){
					$('.balance-money').animate({'top':'0px'},200);
				},function(){
					$('.balance-money').animate({'top':'40px'},200);
				});
				$(".recharge").hover(function(){
					$('.torecharge').animate({'top':'0px'},200);
				},function(){
					$('.torecharge').animate({'top':'40px'},200);
				});
			})
		</script>
@endsection

