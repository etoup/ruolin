{!! Form::open(['route' => 'backend.quotas.created', 'role' => 'form']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">新增额度</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('name', '额度区间') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '填写额度区间']) !!}
            </div>
        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('sort', '排序') !!}
                {!! Form::text('sort', 255, ['class' => 'form-control', 'placeholder' => '填写排序']) !!}
            </div>
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary btn-flat">新增额度</button>
</div>
{!! Form::close() !!}

