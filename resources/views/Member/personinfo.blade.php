@extends('Common.homebase')
@section('head')
		<title>会员详情</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/home/css/personinfo.css" />
@endsection
@section('header')
	@include('Common.header')
	@include('Common.nav',['_selected_'=>'center'])
@endsection
@section('content')
		<section id="baseinfo">
			<section id="baseinfobox">
				<div class="avatorimgs">
					<div class="imagebox">
						<div class="upperavator">
							<img @if($info->avators) src="{{$info->avators->path}}" @else src="/home/img/nopic.jpg" @endif />
						</div>
						<div class="loweravator">
							<p class="avatorname">
								<b>{{$info->nickname}}</b>
								<a class="provemobile"></a>
								<a class="proveidcard"></a>
							</p>
							<p class="logintime">
								<span>上次登录时间:{{date('Y-m-d',strtotime($info->last_login_time))}}</span>
							</p>
						</div>
					</div>
				</div>
				<div class="memberinfos">
					<div class="jiben">
						<div class="jibenbox">
							<table class="jiben-info">
								<tr>
									<th align="left" colspan="5">基本信息</th>
								</tr>
								<tr>
									<td><span>年龄：</span>{{date('Y')-$info->year}}岁</td>
									<td><span>性别：</span>{{$configs['sex'][$info->sex]}}</td>
									<td><span>身高：</span>{{$configs['hign_types'][$info->hign]}}</td>
									<td><span>月薪：</span>{{$configs['salarys'][$info->salary]}}</td>
								</tr>
								<tr>
									<td><span>婚姻状况：</span>{{$configs['marry_status'][$info->marray_status]}}</td>
									<td><span>学历：</span>{{$configs['educations'][$info->education]}}</td>
									<td><span>所在地：</span>{{getNameById($info->province)}}--{{getNameById($info->city)}}</td>
									<td><span>住房条件：</span>{{$configs['house_conds'][$info->house_cond]}}</td>

								</tr>
								<tr>
									<td><span>行业：</span>{{$configs['industrys'][$info->industry]}}</td>
									<td><span>生日：</span>{{$info->month}} - {{$info->date}}</td>
									<td><span>民族：</span>{{$configs['nations'][$info->nation]}}</td>
									<td><span>有无孩子：</span>{{$configs['has_childs'][$info->has_child]}}</td>
								</tr>
							</table>
						</div>
						<div class="jibenbox">
							<table class="jiben-info">
								<tr>
									<th align="left" colspan="5">择偶条件</th>
								</tr>
								<tr>
									<td><span>性别：</span>{{$spouses->sex?$configs['sex'][$spouses->sex]:'不限'}}</td>
									<td><span>学历：</span>{{$spouses->education?$configs['educations'][$spouses->education]:'不限'}}</td>
									<td><span>月薪：</span>{{$spouses->salary?$configs['salarys'][$spouses->salary]:'不限'}}</td>
									<td><span>年龄：</span>20岁</td>
								</tr>
								<tr>
									<td><span>身高：</span>{{$spouses->hign?$configs['hign_types'][$spouses->hign]:'不限'}}</td>
									<td><span>行业：</span>{{$spouses->industry?$configs['industrys'][$spouses->industry]:'不限'}}</td>
									<td><span>住房条件：</span>{{$spouses->house_cond?$configs['house_conds'][$spouses->house_cond]:'不限'}}</td>
									<td><span>有无孩子：</span>{{$spouses->has_child?$configs['has_childs'][$spouses->has_child]:'不限'}}</td>
								</tr>
								<tr>

									<td><span>民族：</span>{{$spouses->nation?$configs['nations'][$spouses->nation]:'不限'}}</td>
									<td><span>所在地：</span>{{getNameById($info->city)=='未知'?'不限':getNameById($info->city)}}</td>
									<td><span>婚姻状况：</span>{{$spouses->marry_status?$configs['marry_status'][$spouses->marry_status]:'不限'}}</td>
									<td></td>
								</tr>
							</table>
						</div>
						<div class="choosebotton">
							<input type="button" value="送礼物🎁"/><input type="button" value="喜欢(❤ ω ❤)"/>
						</div>
					</div>
				</div>
			</section>
		</section>
		<!--其他信息-->
		<section id="otherinfo">
			<section id="otherinfobox">
				<!--左边详情 -->
				<div class="memberdetail">
					<div class="memberbox">
						<div class="monologue">
							<p class="infotitle">内心独白</p>
							<p class="infocontent">
								{{$info->monologue}}
							</p>
						</div>
						
						<div class="infodetailsbox">
							<p class="infotitle">标签</p>
							<div class="searchtagbox" id="searchtagbox">
								@foreach($tags as $key=>$tag)
								<p class="seachtags" title="{{$key}}"><span>{{$key}}：</span>
										@if(!empty($tag))
										@foreach($tag as $val)
										<a href="javascript:;">{{$tagconfigs[$key][1][$val]}}</a>
										@endforeach
										@endif
								</p>
								@endforeach
							</div>		
							<div class="searchtagbox">
								<p class="seachtagtitle">选择一个符合他/她的标签<span>给打个标签吧！</span></p>
								@foreach($tagconfigs as $key=>$tags)
								<p class="seachtags" title="{{$key}}"><span>{{$key}}：</span>
									@foreach($tags[1] as $ke=>$tag)
									<a onclick="sticktag(this)"  dataid="{{$ke}}" href="javascript:;">{{$tag}}</a>
									@endforeach
								</p>
								@endforeach
							</div>	
						</div>
						<section class="personalcatebox">
							<p class="infotitle">相片</p>
							<ul class="myphotos clear">
								@forelse($images as $img)
								<li>
									<img @if($img->path) src="{{$img->path}}" @else src="/home/img/nopic.jpg" @endif />
								</li>
								@empty
									<li>
										<img  src="/home/img/nopic.jpg"  />
									</li>
								@endforelse
							</ul>
						</section>
					</div>
				</div>
				<!--右边人物推荐-->
				<div class="memberrecom">
					<ul class="recomendpersons">
						<li>
							<a class="recomendlink" href="">
							<figure class="recomenddetail">
								<img src="/home/img/person/haha.jpg" />
								<figcaption><span>丽莎</span><span>女</span><span>25岁</span><span>175CM</span></figcaption>
							</figure>
							</a>
						</li>
						<li>
							<a class="recomendlink" href="">
							<figure class="recomenddetail">
								<img src="/home/img/person/lisa.jpg" />
								<figcaption><span>丽莎</span><span>女</span><span>25岁</span><span>175CM</span></figcaption>
							</figure>
							</a>
						</li>
						<li>
							<a class="recomendlink" href="">
							<figure class="recomenddetail">
								<img src="/home/img/person/clown.jpg" />
								<figcaption><span>丽莎</span><span>女</span><span>25岁</span><span>175CM</span></figcaption>
							</figure>
							</a>
						</li>
					</ul>
				</div>
			</section>
		</section>
@endsection
@section('javascript')
	<script src="/lib/layer/2.4/layer.js"></script>
	<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		function sticktag(obj){
			var id=$(obj).attr('dataid');  //标签的配置数组索引
			var title=$(obj).parents('.seachtags').attr('title');  //标签所在栏目名称
			var mid='{{$info->id}}';  //会员ID
			var tagname=$(obj).text();  //标签名
			$.post('/Member/sticktag',{id:id,mid:mid,title:title},function(data){
			    	console.log(data);
					if(data.status=='y'){
						$('#searchtagbox').find("p[title='"+title+"']")
							.append('<a href="javascript:;">'+tagname+'</a>');
					}else{
                        layer.msg(data.content,{icon:6,time:1000});
					}
			},'json')
		}
	</script>
@endsection