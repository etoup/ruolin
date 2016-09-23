@extends('layouts.app')

@section('htmlheader_title')
	路演管理
@endsection
@section('contentheader_title')
	路演管理
@endsection
@section('contentheader_description')
	路演列表
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
		<div class="box-body" >
			<div class="row">
				<div class="col-lg-4 col-xs-4">
					<div class="form-group">
						{!! Form::label('title', '路演标题') !!}
						{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '填写路演标题']) !!}
					</div>
				</div>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="button" class="btn btn-sm btn-success pull-right" style="margin-left: 5px;">
				<i class="fa fa-download"></i> 重置
			</button>
			<button type="button" class="btn btn-sm btn-primary pull-right" style="margin-left: 5px;">
				<i class="fa fa-search"></i> 搜索
			</button>
		</div>
		{!! Form::close() !!}
	</div>
	<div class="nav-tabs-custom">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab_1" data-toggle="tab">路演列表</a></li>
			<li class="pull-right" data-toggle="tooltip" title="" data-original-title="创建路演">
				<a href="{{ route('backend.shows.add') }}" data-toggle="modal" class="text-muted"><i class="fa fa-plus"></i></a>
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

							<th>缩略图</th>
							<th>标题</th>
							<th>预期目标</th>
							<th>所属分类</th>
							<th>点击量</th>
							<th>点赞量</th>
							<th>更新时间</th>
							<th>发布人</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						@if ($shows->count())
							@foreach($shows as $v)
							<tr>
								<td>
								<img src="{{ $v->thumbnail }}" height="40" class="img-circle" alt="Shows Image" />
								</td>
								<td><?php echo $v->title ?></td>
								<td><?php echo $v->purpose ?></td>
								<td><?php echo $v->cate ?></td>
								<td><?php echo $v->hits ?></td>
								<td><?php echo $v->likes ?></td>
								<td><?php echo $v->updated_at?></td>
								<td><?php echo $v->name?></td>
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

