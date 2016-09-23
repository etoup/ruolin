@extends('layouts.app')

@section('htmlheader_title')
	联董管理
@endsection
@section('contentheader_title')
	联董管理
@endsection
@section('contentheader_description')
	联董列表
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
						{!! Form::label('nickname', '用户名') !!}
						{!! Form::text('nickname', null, ['class' => 'form-control', 'placeholder' => '填写用户名']) !!}
					</div>
				</div>

				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('date', '注册时间') !!}

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
			<li class="active"><a href="#tab_1" data-toggle="tab">联董列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="创建联董">
				<a href="{{ route('backend.Cochairman.add') }}" data-toggle="modal" class="text-muted"><i class="fa fa-plus"></i></a>
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
							<th>审核状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if (true)
							@foreach($cochairman as $v)
								<tr>
									<td>
										<img src="{{ $v->headimgurl }}" height="40" class="img-circle" alt="User Image" />
									</td>
									<td>{{ $v->nickname }}</td>
									<td>{{ $v->email }}</td>
									<td>{{ $v->mobile }}</td>
									<td>{{ $v->company }}</td>
									<td>{{ $v->position }}</td>
									<td>
										@if( $v['review']==1)
											<span class="label label-success">已审核</span>
										@else
											<span class="label label-danger">未审核</span>
										@endif
									</td>
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
<script type="text/javascript" src="/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/plugins/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	var ue =UE.getEditor('container');
</script>
@endsection

