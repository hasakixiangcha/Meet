@extends('Common.homebase')
@section('head')
		<title>基本资料</title>
		<link rel="stylesheet" href="/home/css/personal.css" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('header')
	@include('Common.header')
	@include('Common.nav',['_selected_'=>'center'])
@endsection
@section('content')

		<section id="personalbigbox">
			<section id="personalbox" class="clear">
				@include('Common.asidenav',['aside'=>'spouse'])
				<!--右边开始-->
				<section class="personalcatecontents">
					<section class="personalcatebox">
						<form action="/Member/spousestore" method="post">
							{{csrf_field()}}
						<table class="goodslist">
							<tr class="personinfo">
								<th>性别：</th>
								<td>
									<select name="sex">
										@foreach($configs['sex'] as $key=>$sex)
										<option @if($info->sex==$key) selected @endif value="{{$key}}">{{$sex}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							{{--<tr class="personinfo">
								<th>年龄：</th>
								<td>
									<select name="birthyear" class="shortselect">
										<option value="0">18岁</option>
										<option value="1">19岁</option>
										<option value="2">20岁</option>
										<option value="3">21岁</option>
										<option value="4">22岁</option>
									</select>
									<select name="birthmonth" class="shortselect">
										<option value="0">18岁</option>
										<option value="1">19岁</option>
										<option value="2">20岁</option>
										<option value="3">21岁</option>
										<option value="4">22岁</option>
									</select>
								</td>
								<td></td>
							</tr>--}}
							<tr class="personinfo">
								<th>婚姻状况：</th>
								<td>
									<select name="marry_status">
										@foreach($configs['marry_status'] as $key=>$marry)
											<option @if($info->marry_status==$key) selected @endif value="{{$key}}">{{$marry}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>学历：</th>
								<td>
									<select name="education">
										@foreach($configs['educations'] as $key=>$education)
											<option @if($info->education==$key) selected @endif value="{{$key}}">{{$education}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>目前居住地：</th>
								<td>
									<select onchange="selectnext(this,'city')" class="shortselect">
										<option  value="0">不限</option>
										@foreach($provinces as $province)
											<option @if($parent_id==$province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
										@endforeach
									</select>
									<select name="city" class="shortselect">
										@if(!$parent_id)
											<option  value="0">不限</option>
										@else
											@foreach($citys as $city)
											<option  value="{{$city->id}}">{{$city->name}}</option>
											@endforeach
										@endif
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>身高：</th>
								<td>
									<select name="hign" class="shortselect">
										@foreach($configs['hign_types'] as $key=>$hign)
											<option @if($info->hign==$key) selected @endif value="{{$key}}">{{$hign}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>月收入：</th>
								<td>
									<select name="salary">
										@foreach($configs['salarys'] as $key=>$salary)
											<option @if($info->salary==$key) selected @endif value="{{$key}}">{{$salary}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>住房条件：</th>
								<td>
									<select name="house_cond">
										@foreach($configs['house_conds'] as $key=>$house)
											<option @if($info->house_cond==$key) selected @endif value="{{$key}}">{{$house}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>有无孩子：</th>
								<td>
									<select name="has_child">
										@foreach($configs['has_childs'] as $key=>$child)
											<option @if($info->has_child==$key) selected @endif value="{{$key}}">{{$child}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th>从事行业：</th>
								<td>
									<select name="industry">
										@foreach($configs['industrys'] as $key=>$industry)
											<option @if($info->industry==$key) selected @endif value="{{$key}}">{{$industry}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							{{--<tr class="personinfo">
								<th>有无照片：</th>
								<td>
									<select name="haspohotos">
										<option value="0">不限</option>
										<option value="1">有</option>
									</select>
								</td>
								<td></td>
							</tr>
--}}
							<tr class="personinfo">
								<th>民族：</th>
								<td>
									<select name="nation">
										@foreach($configs['nations'] as $key=>$nation)
											<option @if($info->nation==$key) selected @endif value="{{$key}}">{{$nation}}</option>
										@endforeach
									</select>
								</td>
								<td></td>
							</tr>
							<tr class="personinfo">
								<th></th>
								<td>
									<button>确认保存</button>
								</td>
								<td></td>
							</tr>
						</table>
						</form>
					</section>
				</section>
				<!--右边结束-->
			</section>
		</section>
@endsection
@section('javascript')
		<script charset="utf-8" src="/lib/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/lib/kindeditor/lang/zh_CN.js"></script>
		<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
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
            function selectnext(obj,type){
                var value=$(obj).val();
                $.post('/getcitynext',{id:value},function(res){
                    $("select[name="+type+"]").html(res);
                });
            }
		</script>
@endsection
