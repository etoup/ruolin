@extends('layouts.app')

@section('htmlheader_title')
	会员管理
@endsection
@section('contentheader_title')
	会员管理
@endsection
@section('contentheader_description')
	会员列表
@endsection


@section('main-content')
	{{--<div class="alert alert-success alert-dismissible">--}}
		{{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
		{{--<h4><i class="icon fa fa-check"></i> 提示</h4>--}}
		{{--成功消息提示--}}
	{{--</div>--}}
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">搜索</h3>

			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		{!! Form::open(['route' => 'backend.users.search','role' => 'form']) !!}
		<div class="box-body">
			<div class="row">
				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('nickname', '昵称') !!}
						{!! Form::text('nickname', request('nickname', $default = null), ['class' => 'form-control', 'placeholder' => '填写昵称']) !!}
					</div>
				</div>

				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('email', '邮箱') !!}
						{!! Form::text('email', request('email', $default = null), ['class' => 'form-control', 'placeholder' => '填写邮箱']) !!}
					</div>
				</div>
				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('mobile', '手机') !!}
						{!! Form::text('mobile', request('mobile', $default = null), ['class' => 'form-control', 'placeholder' => '填写手机']) !!}
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<a href="{{ route('backend.users') }}" class="btn btn-sm btn-warning pull-left">
				<i class="fa fa-mail-reply-all"></i> 取消搜索
			</a>
			<button type="submit" class="btn btn-sm btn-primary pull-right" style="margin-left: 5px;">
				<i class="fa fa-search"></i> 搜索
			</button>
		</div>
		{!! Form::close() !!}
	</div>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">会员列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="创建会员">
				<a href="#" data-toggle="modal" data-target="#create" class="text-muted"><i class="fa fa-plus"></i></a>
			</li>
			<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">

					</div>
				</div>
			</div>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1">


				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>头像</th>
							<th>昵称</th>
							<th>邮箱</th>
							<th>手机</th>
							<th>公司</th>
							<th>职位</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if ($data->count())
							@foreach($data as $v)
							<tr>
								<td>
									<img src="{{ $v->headimgurl }}" height="40" class="img-circle" alt="User Image" />
								</td>
								<td>{{ $v->nickname }}</td>
								<td>{{ $v->email }}</td>
								<td>{{ $v->mobile }}</td>
								<td>{{ $v->company }}</td>
								<td>{{ $v->position }}</td>
								<td>{!! $v->action_buttons !!}</td>
							</tr>
							<div class="modal fade" id="edit-{{ $v->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
								<div class="modal-dialog">
									<div class="modal-content">

									</div>
								</div>
							</div>
							@endforeach
							@else
							<td colspan="10">还没有相关数据！</td>
					    @endif
					</tbody>
				</table>
			</div>
		</div>
		<div class="box-footer">
			{{ trans('pagination.total', ['total' => $data->total()]) }}
			<div class="pull-right">
				{{ $data->render() }}
			</div>
		</div>
	</div>

@endsection
