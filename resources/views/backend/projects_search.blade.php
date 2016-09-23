@extends('layouts.app')

@section('htmlheader_title')
	项目管理
@endsection
@section('contentheader_title')
	项目管理
@endsection
@section('contentheader_description')
	项目列表
@endsection


@section('main-content')
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">搜索</h3>

			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		{!! Form::open(['route' => 'backend.projects.search','role' => 'form']) !!}
		<div class="box-body">
			<div class="row">
				<div class="col-lg-3 col-xs-3">
					<div class="form-group">
						{!! Form::label('name', '姓名') !!}
						{!! Form::text('name', request('name', $default = null), ['class' => 'form-control', 'placeholder' => '填写姓名关键字']) !!}
					</div>
				</div>
				<div class="col-lg-3 col-xs-3">
					<div class="form-group">
						{!! Form::label('ways', '联系方式') !!}
						{!! Form::text('ways', request('ways', $default = null), ['class' => 'form-control', 'placeholder' => '填写联系方式']) !!}
					</div>
				</div>
				<div class="col-lg-3 col-xs-3">
					<div class="form-group">
						{!! Form::label('business_name', '企业名称') !!}
						{!! Form::text('business_name', request('business_name', $default = null), ['class' => 'form-control', 'placeholder' => '填写企业名称关键字']) !!}
					</div>
				</div>
				<div class="col-lg-3 col-xs-3">
					<div class="form-group">
						{!! Form::label('brand_name', '品牌名称') !!}
						{!! Form::text('brand_name', request('brand_name', $default = null), ['class' => 'form-control', 'placeholder' => '填写品牌名称关键字']) !!}
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<a href="{{ route('backend.projects') }}" class="btn btn-sm btn-warning pull-left">
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
			<li class="active"><a href="#tab_1" data-toggle="tab">项目列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="创建项目">
				<a href="{{ route('backend.projects.create') }}" data-toggle="modal" data-target="#create" class="text-muted"><i class="fa fa-plus"></i></a>
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
							<th>ID</th>
							<th>姓名</th>
							<th>联系方式</th>
							<th>企业名称</th>
							<th>品牌名称</th>
							<th>地区</th>
							<th>行业</th>
							<th>额度</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if ($data->count())
							@foreach($data as $v)
							<tr>
								<td>{{ $v->id }}</td>
								<td>{{ $v->name }}</td>
								<td>{{ $v->ways }}</td>
								<td>{{ $v->business_name }}</td>
								<td>{{ $v->brand_name }}</td>
								<td>{{ $v->regions_name }}</td>
								<td>{{ $v->industries_name }}</td>
								<td>{{ $v->quotas_name }}</td>
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
