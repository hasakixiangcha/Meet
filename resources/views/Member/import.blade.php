@extends('Common.adminbase')
@section('title')
<title>会员导入- 会员管理 - H-ui.admin v3.1</title>
@endsection
@section('content')
<article class="page-container">
	<form action="/Member/import" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-admin-add">
		{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文件：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="btn-upload form-group">
			<input class="input-text upload-url" type="text"  id="uploadfile" readonly nullmsg="请添加附件！" style="width:200px">
			<a href="javascript:void(0);" class="btn btn-primary radius upload-btn"><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
			<input type="file"  multiple name="fileexcel" class="input-file">
			</span>
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
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
});
</script> 
@endsection