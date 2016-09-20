{!! Form::open(['route' => 'backend.regions.created', 'role' => 'form']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">新增地区</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('name', '地区名称') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '填写地区名称']) !!}
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
    <button type="submit" class="btn btn-primary btn-flat">新增地区</button>
</div>
{!! Form::close() !!}

