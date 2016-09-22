@extends('layouts.app')

@section('htmlheader_title')
	区间管理
@endsection
@section('contentheader_title')
	区间管理
@endsection
@section('contentheader_description')
	区间列表
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
		<div class="box-body">
			<div class="row">
				<div class="col-lg-4 col-xs-4">
					{!! Form::open(['route' => 'backend.quotas.search','role' => 'form']) !!}
						<div class="input-group">
							{!! Form::text('name', request('name', $default = null), ['class' => 'form-control', 'placeholder' => '填写额度区间']) !!}
                          <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-flat">搜索</button>
                          </span>
							<span class="input-group-btn">
                            <a href="{{ route('backend.quotas') }}" class="btn btn-danger btn-flat">取消搜索</a>
                          </span>
						</div>
					{!! Form::close() !!}
				</div>
			</div>

		</div>
	</div>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">额度列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="新增行业">
				<a href="{{ route('backend.quotas.create') }}" data-toggle="modal" data-target="#create" class="text-muted"><i class="fa fa-plus"></i></a>
			</li>
			<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm">
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
							<th>ID</th>
							<th>区间</th>
							<th>排序</th>
							<th>时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if ($data->count())
							@foreach($data as $v)
							<tr>
								<td>{{ $v->id }}</td>
								<td>{{ $v->name }}</td>
								<td>{{ $v->sort }}</td>
								<td>{{ $v->created_at }}</td>
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
