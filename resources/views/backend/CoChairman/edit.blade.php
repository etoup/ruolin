{!! Form::open(['route' => 'backend.Cochairman.editOk', 'role' => 'form']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">编辑联董</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('userid', '用户ID') !!}
                {!! Form::text('userid', $info->userid, ['class' => 'form-control', 'placeholder' => '填写用户ID']) !!}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    {!! Form::hidden('id', $info->id) !!}
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary btn-flat">提交更新</button>
</div>
{!! Form::close() !!}