@extends('Common.homebase')
@section('head')
		<title>我的相册</title>
		<link rel="stylesheet" href="/home/css/personal.css" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
@endsection
@section('header')
	@include('Common.header')
	@include('Common.nav',['_selected_'=>'center'])
@endsection
@section('content')
		<section id="personalbigbox">
			<section id="personalbox" class="clear">
				@include('Common.asidenav',['aside'=>'photos'])
				<!--右边开始-->
				<section class="personalcatecontents">
				
					<section class="personalcatebox">
						<p class="boxtitle"><input onclick="addgallery()" type="button" value="添加相片"/><input onclick="delgallery()" type="button" value="删除相片"/></p>
						<form action="/Member/photosAdd" method="post">
							{{csrf_field()}}
						<div class="addgallery">
							<div class="formControls col-xs-8 col-sm-9">
								<div class="uploader-list-container">
									<div class="queueList">
										<div id="dndArea" class="placeholder">
											<div id="filePicker-2"></div>
											<p>或将照片拖到这里，单次最多可选300张</p>
										</div>
									</div>
								</div>
							</div>
							<div class="addbtn"><button>添加</button></div>
						</div>
						</form>
						<ul class="myphotos clear">
								@forelse($images as $img)
								<li>
									<img dataid="{{$img->id}}" onclick="selectimg(this)" src="{{$img->path}}" />
								</li>
								@empty
								<li style="width:100%;height:80px;text-align: center;font-size: 50px;line-height:80px ">
									暂无图片
								</li>
								@endforelse

								{{$errors->first()}}
						</ul>
						<input id="imgids" type="hidden" name="imgids" value=""/>
					</section>
				</section>
				<!--右边结束-->
			</section>
		</section>
@endsection
@section('javascript')
		<script charset="utf-8" src="/lib/kindeditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/lib/kindeditor/lang/zh_CN.js"></script>
		<script src="/lib/layer/2.4/layer.js"></script>
		<!-- 多图片上传 -->
		<script type="text/javascript" src="/lib/webuploader/0.1.5/webuploader.min.js"></script>
		<script type="text/javascript" src="/home/js/images.js"></script>
		<script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
			function addgallery(){
				var height=$(".addgallery").css('height');
				if(parseInt(height)){
					$(".addgallery").css('height',0);
				}else{
					$(".addgallery").css('height','auto');
				}
			}
			//删除相册
			function delgallery(){
				var a=$("#imgids").val();
				if(a!=''){
					$.ajax({
						url:'/Member/photosDel',
						type:'post',
						datatype:'json',
						data:{ids:a},
						success:function(res){
							if(res.status=='y'){
                                var arr=a.split(',');
                                for(var i=0;i<arr.length;i++){
                                    $("img[dataid='"+arr[i]+"']").parent().remove();
                                }
                                layer.msg(res.content,{icon:1,time:1000});
							}else{
                                layer.msg(res.content,{icon:0,time:2000});
							}
						},
						error:function (error) {

                        }
					});
				}
			}
			function selectimg(obj){
				var a=$(obj).prop('class');
				if(a=='selectture'){
					var b=$(obj).attr('dataid');
					var ids=$('#imgids').val();
					var arr=ids.split(',')
					var index=arr.indexOf(b);
					arr.splice(index,1)
					var str=arr.join(',')
					$('#imgids').val(str);
					$(obj).removeClass('selectture');
				}else{
					var b=$(obj).attr('dataid');
					var ids=$('#imgids').val();
					if(ids==''){
						$('#imgids').val(b);
					}else{
						$('#imgids').val(ids+','+b);
					}
					$(obj).addClass('selectture');
				}
			}
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