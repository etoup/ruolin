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
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">分类列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="添加分类">
				<a href="#" data-toggle="modal" data-target="#create" class="text-muted"><i class="fa fa-plus"></i></a>
			</li>
			<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
					<!--增加分类开始-->
						{!! Form::open(['route' => 'backend.shows.addCate', 'role' => 'form']) !!}
						<div class="modal-body">
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										{!! Form::label('title', '分类名称') !!}
										{!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => '填写分类名称']) !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										{!! Form::label('types', '分类编号') !!}
										{!! Form::text('types', '', ['class' => 'form-control', 'placeholder' => '填写1-100']) !!}
									</div>
								</div>

								<div class="col-lg-6 col-xs-6">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-xs-6">
									<div class="form-group">
										{!! Form::label('sort', '排序') !!}
										{!! Form::text('sort', '', ['class' => 'form-control', 'placeholder' => '排序1-255']) !!}
									</div>
								</div>

								<div class="col-lg-6 col-xs-6">
								</div>
							</div>


							<div class="row">
								<div class="col-lg-12 col-xs-12">
									<p style='width:auto; padding-left:0; float:left;'>
										<script id="container" name="content" type="text/plain"></script>
									</p>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
							<button type="submit" class="btn btn-primary btn-flat">提交</button>
						</div>
						{!! Form::close() !!}
					<!--增加分类结束-->
					</div>
				</div>
			</div>
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab_1">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>类型</th>
							<th>类型名称</th>
							<th>排序</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if (true)
						@foreach($cate as $v)
							<tr>
								<td>{{$v->types}}</td>
								<td>{{$v->title}}</td>
								<td>{{$v->sort}}</td>
								<td>{{$v->updated_at}}</td>
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
	</div>
@endsection
