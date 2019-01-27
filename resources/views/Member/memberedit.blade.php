@extends('Common.adminbase')
@section('title')
<title>添加会员- 会员管理 - H-ui.admin v3.1</title>
@endsection
@section('content')
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>会员账号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" disabled="disabled" value="{{$info->account}}" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="不填写则不更改" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">内心独白：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="monologue" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" >{{$info->monologue}}</textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>
@endsection
@section('footer')
	@parent
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{

		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "/Member/update/{{$info->id}}" ,
				success: function(data){
				    console.log(data);
				    if(data.status=='y'){
                        layer.msg('更新成功!',{icon:1,time:1000});
                        setTimeout(function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.location.reload(); //刷新父级页面
                            parent.layer.close(index);
						},1000)
					}else{
                        layer.msg(data.content,{icon:0,time:1000});
					}
				},
                error: function(XmlHttpRequest, textStatus, errorThrown){
					layer.msg('error!',{icon:1,time:1000});
				}
			});

		}
	});
});
</script> 
@endsection