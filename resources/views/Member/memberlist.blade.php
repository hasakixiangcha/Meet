@extends('Common.adminbase')
@section('title')
<title>会员管理</title>
@endsection
@section('header')
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员中心 <span class="c-gray en">&gt;</span> 会员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
@endsection
@section('content')
<div class="page-container">
	<form action="/Member/adminlist"  method="get">
	<div class="text-c"> 日期范围：
		<input type="text" name="starttime" @if(isset($gets['starttime'])) value="{{$gets['starttime']}}" @endif onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" name="endtime" @if(isset($gets['endtime'])) value="{{$gets['endtime']}}" @endif onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" name="account" @if(isset($gets['account'])) value="{{$gets['account']}}" @endif class="input-text" style="width:250px" placeholder="输入会员账号" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜会员</button>
	</div>
	</form>
	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="javascript:;" onclick="datadel('members')" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
			<a href="javascript:;" onclick="layer_show('会员导出','/Member/exportview','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe644;</i>导出会员</a>
			<a href="javascript:;" onclick="layer_show('会员导入','/Member/importview','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe645;</i>导入会员</a>
		</span> <span class="r">共有数据：<strong>{{$data->total()}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"></th>
				<th width="80">账号</th>
				<th width="100">昵称</th>
				<th width="150">头像</th>
				<th width="40">性别</th>
				<th width="50">余额</th>
				<th width="40">年龄</th>
				<th width="200">地址</th>
				<th width="100">上次登录</th>
				<th width="100">注册时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@forelse($data as $info)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$info->id}}" name="ids[]"></td>
				<td>{{$info->account}}</td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('{{$info->nickname}}','/Member/membershow/{{$info->id}}','10001','360','400')">{{$info->nickname}}</u></td>
				<td><img style="width:100%;" @if($info->avators) src="{{$info->avators->path}}" @endif /></td>
				<td>{{config('mydataset.sex')[$info->sex]}}</td>
				<td>{{$info->balance}}</td>
				<td>{{date('Y')-$info->year}}</td>
				<td>{{getNameById($info->province)}}{{getNameById($info->city)}}{{getNameById($info->distinct)}}</td>
				<td>{{$info->last_login_time}}</td>
				<td>{{$info->created_at}}</td>
				<td class="td-status">
					@if($info->status)
						<span class="label label-success radius">已启用</span>
					@else
						<span class="label label-defaunt radius">已停用</span>
					@endif
				</td>
				<td class="td-manage">
					@if($info->status)
					<a class="delete" style="text-decoration:none" onClick="member_stop(this,'{{$info->id}}','members',0)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					@else
						<a class="delete" style="text-decoration:none" onClick="member_start(this,'{{$info->id}}','members',1)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>
					@endif
						<a title="编辑" href="javascript:;" onclick="admin_edit('会员编辑','/Member/{{$info->id}}/edit','2','800','500')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				</td>
			</tr>
		@empty
			<tr>
				<td colspan="12" class="text-c">
					暂无数据
				</td>
			</tr>
		@endforelse
		</tbody>
		<tfoot>
			<tr>
				<td colspan="12" class="text-r">
					{{ $data->appends($gets)->links() }}
				</td>
			</tr>
		</tfoot>
	</table>
	</div>
</div>
@endsection
@section('footer')
	@parent
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
$(function(){
	/*$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
		]
	});*/
	
});
/*会员-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    layer_show(title,url,w,h);
}
</script> 
@endsection