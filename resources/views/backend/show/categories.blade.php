@extends('layouts.app')

@section('htmlheader_title')
	路演管理
@endsection
@section('contentheader_title')
	路演管理
@endsection
@section('contentheader_description')
	路演分类
@endsection


@section('main-content')
{{--	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i>提示</h4>
		成功消息提示
	</div>--}}
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">搜索</h3>

			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
			</div>
		</div>
		{!! Form::open(['role' => 'form']) !!}
		<div class="box-body">
			<div class="row">
				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('title', '商品名称') !!}
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '填写商品名称']) !!}
					</div>
				</div>

				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('date', '发布时间') !!}

						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right" id="reservation">
						</div>
						<!-- /.input group -->
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="button" class="btn btn-sm btn-success pull-right" style="margin-left: 5px;">
				<i class="fa fa-download"></i> 导出
			</button>
			<button type="button" class="btn btn-sm btn-primary pull-right" style="margin-left: 5px;">
				<i class="fa fa-search"></i> 搜索
			</button>
		</div>
		{!! Form::close() !!}
	</div>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">分类列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="添加分类">
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
							<th>路演标题</th>
							<th>路演类型</th>
							<th>排序</th>
						</tr>
					</thead>
					<tbody>
						@if (true)
						@foreach($cate as $v)
							<tr>
								<td>{{$v->title}}</td>
								<td>{{$v->types}}</td>
								<td>{{$v->sort}}</td>
							</tr>
						@endforeach
							@else
							<td colspan="10">还没有相关数据！</td>
					    @endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
