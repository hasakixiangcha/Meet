@extends('Common.adminbase')
@section('title')
<title>用户查看</title>
@endsection
@section('header')
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" @if($data->avators) src="{{$data->avators->path}}" @else src="/static/h-ui/images/ucnter/avatar-default.jpg" @endif >
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18">{{$data->nickname}}</span>
			<span class="pl-10 f-12">余额：{{$data->balance}}</span>
		</dt>
		<dd class="pt-10 f-12" style="margin-left:0">{{$data->monologue}}</dd>
	</dl>
</div>
@endsection
@section('content')
<div class="pd-20">
	<table class="table">
		<thead>
			<tr>
				<th colspan="2" style="text-indent: 100px;font-size: 24px;">基本资料</th>
				<th colspan="2" style="text-indent: 100px;font-size: 24px;">择偶条件</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th class="text-r" width="80">性别：</th>
				<td>{{$configs['sex'][$data->sex]}}</td>
				<th class="text-r" width="80">性别：</th>
				<td>{{$data->spouse->sex?$configs['sex'][$data->spouse->sex]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">婚姻状况：</th>
				<td>{{$configs['marry_status'][$data->marray_status]}}</td>
				<th class="text-r" width="80">婚姻状况：</th>
				<td>{{$data->spouse->marry_status?$configs['marry_status'][$data->spouse->marry_status]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">学历：</th>
				<td>{{$configs['educations'][$data->education]}}</td>
				<th class="text-r" width="80">学历：</th>
				<td>{{$data->spouse->education ? $configs['educations'][$data->spouse->education] : '不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">所属行业：</th>
				<td>{{$configs['industrys'][$data->industry]}}</td>
				<th class="text-r" width="80">所属行业：</th>
				<td>{{$data->spouse->industry?$configs['industrys'][$data->spouse->industry]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">薪资水平：</th>
				<td>{{$configs['salarys'][$data->salary]}}</td>
				<th class="text-r" width="80">薪资水平：</th>
				<td>{{$data->spouse->salary?$configs['salarys'][$data->spouse->salary]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">身高：</th>
				<td>{{$configs['hign_types'][$data->hign]}}</td>
				<th class="text-r" width="80">身高：</th>
				<td>{{$data->spouse->hign?$configs['hign_types'][$data->spouse->hign]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">住房条件：</th>
				<td>{{$configs['house_conds'][$data->house_cond]}}</td>
				<th class="text-r" width="80">住房条件：</th>
				<td>{{$data->spouse->house_cond?$configs['house_conds'][$data->spouse->house_cond]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">有无孩子：</th>
				<td>{{$configs['has_childs'][$data->has_child]}}</td>
				<th class="text-r" width="80">有无孩子：</th>
				<td>{{$data->spouse->has_child?$configs['has_childs'][$data->spouse->has_child]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">民族：</th>
				<td>{{$configs['nations'][$data->nation]}}</td>
				<th class="text-r" width="80">民族：</th>
				<td>{{$data->spouse->nation?$configs['nations'][$data->spouse->nation]:'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">生日：</th>
				<td>{{$data->month}}月{{$data->date}}日</td>
				<th class="text-r" width="80">所在城市：</th>
				<td>{{$data->spouse->city?getNameById($data->spouse->city):'不限'}}</td>
			</tr>
			<tr>
				<th class="text-r">qq：</th>
				<td>{{$data->qq}}</td>
				<th class="text-r">年龄：</th>
				<td>{{$data->spouse->age}}</td>
			</tr>
			<tr>
				<th class="text-r">微信：</th>
				<td>{{$data->weixin}}</td>

			</tr>
		</tbody>
	</table>
</div>
@endsection
@section('footer')
	@parent
@endsection