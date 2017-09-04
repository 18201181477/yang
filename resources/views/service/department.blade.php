<?php
use App\Queque;
?>
@extends('layouts.detail_layouts')

@section('right_content')	
<!-- 右侧内容 -->
<div class="col-md-9">
	<!-- 成功提示框 -->
	@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> {{Session::get('success')}}
	</div>
	@endif
	<!-- 失败提示框 -->
	@if(Session::has('error'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> {{Session::get('error')}}
	</div>
	@endif
	<!-- 失败提示框 -->
	@if(Session::has('pay'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		<strong>提示：</strong> <a href="{{url('pay')}}">{{Session::get('pay')}}</a>
	</div>
	@endif
	<!-- 自定义内容 -->
	<div class="panel panel-default">
		<div class="panel-heading">所有科室</div>
		<div class="panel-body">
			<table class="table table-striped table-responsive table-hover">
				<thead>
					<tr>
						<th>科室名称</th>
						<th width="120">操作</th>
					</tr>
				</thead>
				<tbody>
				@foreach($param as $val)
					<tr>
						<td>{{$val->name}}</td>
						<td>
						@if(\Auth::user())
							@if(\Auth::user()->status==0)
							<a href="{{url('/queque',['id',$val['id']])}}">挂号</a>
							@else
							<a href="javascript:;">不可操作</a>
							@endif
						@else
							<a href="{{url('/queque',['id',$val['id']])}}">挂号</a>
						@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<nav>
	<font color="red">* 温馨提示：当前挂号有效时间为一周内</font>
		<div class="pagination pull-right">
			{{$param->render()}}
		</div>
	</nav>	
</div>
	<script>
	$(function(){
		
	})
	</script>
@stop