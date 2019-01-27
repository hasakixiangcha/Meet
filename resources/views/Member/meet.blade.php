@extends('Common.homebase')
@section('head')
		<title>遇见</title>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/Home/css/meet.css" />
@endsection
@section('header')
	@include('Common.header')
	@include('Common.nav',['_selected_'=>'meet'])
@endsection
@section('content')
		<!--搜索栏开始-->
		<section id="search-bigbox">
			<form id="form-member">
			<section id="search-box">
					<div class="searchtagbox">
						<p class="seachtagtitle">选择一个符合他/她的标签<span>有标签用户才会被搜到！<a href="">完善资料</a> 或  <a>回答QA</a>可获得标签</span></p>
						@foreach($tags as $key=>$tag)
						<p class="seachtags">
								<span>{{$key}}</span>
							@foreach($tag[1] as $ke=>$val)
							   <a dataid="{{$ke}}" onclick="selecedtag(this)" href="javascript:;">{{$val}}</a>
							@endforeach
							<input type="hidden" name="tags[]">
						</p>
						@endforeach
					</div>	
					<div class="seachcondbox">
						<p><span>筛&nbsp;&nbsp;&nbsp;&nbsp;选：</span>
							<select name="province" style="width:80px;" onchange="selectcity(this)" class="address">
								<option value="0" >省份</option>
								@foreach($citys as $val)
								<option value="{{$val->id}}">{{$val->name}}</option>
								@endforeach
							</select>
							<select name="city" style="width:80px;" class="address">
								<option value="0">城市</option>
							</select>
							<select name="sex" class="age">

								<option value="0">性别</option>
								@foreach($configs['sex'] as $key=>$val)
									@if($key)
									<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="minyear" class="age">
								<option value="0">年龄</option>
								@foreach($configs['years'] as $key=>$val)

										<option value="{{$val}}">{{date('Y')-$val}}</option>

								@endforeach
							</select>
							至
							<select name="maxyear" class="age">
								<option value="0">年龄</option>
								@foreach($configs['years'] as $key=>$val)

										<option value="{{$val}}">{{date('Y')-$val}}</option>

								@endforeach
							</select>
							<select name="marray_status" class="age">
								<option value="0">婚姻</option>
								@foreach($configs['marry_status'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="education" class="age">
								<option value="0">学历</option>
								@foreach($configs['educations'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="hign" class="age">
								<option value="0">身高</option>
								@foreach($configs['hign_types'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="industry" class="age">
								<option value="0">行业</option>
								@foreach($configs['industrys'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="salary" class="age">
								<option value="0">薪资</option>
								@foreach($configs['salarys'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
							<select name="nation" class="age">
								<option value="0">民族</option>
								@foreach($configs['nations'] as $key=>$val)
									@if($key)
										<option value="{{$key}}">{{$val}}</option>
									@endif
								@endforeach
							</select>
						</p>
						<p>
							<button class="searchbtn" onclick="changetype(0)" type="submit">确定</button>
						</p>
					</div>
			</section>
				<input type="hidden" name="different"  value="0">
			</form>
		</section>
		<!--搜索栏结束
			人物展示开始			
		-->
		<section id="searchpersons">
			<section id="searchpersonbox">
				<p class="reloadpersons"><button form="form-member" onclick="changetype(1)" type="submit" ><i></i>换一批</button></p>
				<div class="personsbox">
					<ul class="personsul">
						@foreach($data as $info)
						<li dataid="{{$info->id}}" onclick="details(this)" class="persons">
							@if($info->avators)
								<img src="{{$info->avators->path}}"/>
							@else
								<img src="/Home/img/nopic.jpg"/>
							@endif
							<p><b>{{$info->nickname}}</b>
								<span>{{date('Y') - $info->year}}岁</span>
								<span>{{getNameById($info->city)}}</span>
								<span>{{$configs['hign_types'][$info->hign]}}cm</span>
								<span>{{$configs['educations'][$info->education]}}</span>
								<span>{{$configs['salarys'][$info->salary]}}</span>
							</p>
						</li>
						@endforeach
					</ul>
					<div class="personselect">
						<div class="selectfeel">
							<div onclick="selectfeel(-1)">
								<p>没感觉</p>
							</div>
							<div onclick="selectfeel(0)">
								<p>可考虑</p>
							</div>
							<div onclick="selectfeel(1)">
								<p>很喜欢
						</div>
					</div>
				</div>
			</section>
		</section>
@endsection
@section('javascript')
	<script type="text/javascript" src="/Home/js/func.js" ></script>
	<script type="text/javascript" src="/static/h-ui/js/h-ui.min.js"></script>
	<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
	<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function details(obj){
            var dataid=$(obj).attr('dataid');
            location.href='/Member/personalinfo/'+dataid;
        }
        $(function(){
            $("form").submit(function(){
                $("form").ajaxSubmit({
                    url:'/Member/meetsearch',
                    type:'post',
                    dataType:'json',
                    success:function(data){   //自己定义的错误消息 ，保阔正确返回的数据
                        console.log(data)
						if(data==''){
                            layer.msg('没有新的数据!',{icon: 0,time:1000});
						}else{
                            $(".personsul").html(data);
						}
                    },
                    error:function(msg){  //只有在程序出错的情况下，进入该方法

                    }
                })
                return false;
            });
        })
		//区别确定和换一批
		function changetype(val){
            $("input[name='different']").val(val);
		}
        //遇见页面感觉选择
        function selectfeel(num){
            var len=$(".persons").length;
            if(len<1){
                layer.msg('已经没有了!',{icon: 0,time:1000});
            }else{
                if(num==0){

                }else if(num==-1){

                }else{
					@auth('home')
                     	var lover=$('.persons').eq(len-1).attr('dataid');
						$.post('/Member/meetlover',{id:lover},function(data){
							console.log(data)
						})
					@endauth
					@guest('home')
                    	layer.msg('请先登录!',{icon: 0,time:1000});
                    	setTimeout(function () {   //提示之后延迟一秒条跳转
                            location.href='/Index/login'
                        },1000)
					@endguest
                }
              /*  $(".persons").eq(len-1).remove();*/
            }
        }
        function selectcity(obj){
            var value=$(obj).val();
			$.post('/getcitynext',{id:value},function(data){
				$("select[name='city']").html(data);
			})
        }

        function selecedtag(obj){
            var cla=$(obj).prop('class');
            var value=$(obj).attr('dataid'); //获取标签的ID
            var hiddenvalue=$(obj).siblings('input[type=hidden]').val()//获取该行内的隐藏框的值
            if(cla){
                $(obj).removeClass('selectedtag');
				var arr=hiddenvalue.split(',');
                var index=arr.indexOf(value);
                arr.splice(index);  //剔除元素。
                $(obj).siblings('input[type=hidden]').val(arr.join(','));
			}else{

                $(obj).addClass('selectedtag');  //给标签添加选中样式

                if(hiddenvalue==''){
                    $(obj).siblings('input[type=hidden]').val(value);
                }else{
                    hiddenvalue+=','+value
                    $(obj).siblings('input[type=hidden]').val(hiddenvalue);
                }
			}


		}
	</script>
@endsection
