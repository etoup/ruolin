{!! Form::open(['route' => 'backend.industries.store', 'role' => 'form']) !!}
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span></button>
	<h4 class="modal-title">编辑行业</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-lg-12 col-xs-12">
			<div class="form-group">
				{!! Form::label('name', '行业名称') !!}
				{!! Form::text('name', $info->name, ['class' => 'form-control', 'placeholder' => '填写行业名称']) !!}
			</div>
		</div>
		<div class="col-lg-12 col-xs-12">
			<div class="form-group">
				{!! Form::label('sort', '排序') !!}
				{!! Form::text('sort', $info->sort, ['class' => 'form-control', 'placeholder' => '填写排序']) !!}
			</div>
		</div>
	</div>

</div>
<div class="modal-footer">
	{!! Form::hidden('id', $info->id) !!}
	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
	<button type="submit" class="btn btn-primary btn-flat">编辑行业</button>
</div>
{!! Form::close() !!}

