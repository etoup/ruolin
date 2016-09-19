{!! Form::open(['route' => 'backend.users.store', 'role' => 'form']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">编辑会员</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('nickname', '昵称') !!}
                {!! Form::text('nickname', $info->nickname, ['class' => 'form-control', 'placeholder' => '填写昵称']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('email', '邮箱') !!}
                {!! Form::text('email', $info->email, ['class' => 'form-control', 'placeholder' => '填写邮箱']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('mobile', '手机') !!}
                {!! Form::text('mobile', $info->mobile, ['class' => 'form-control', 'placeholder' => '填写手机']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('sex', '性别') !!}
                {!! Form::text('sex', $info->sex, ['class' => 'form-control', 'placeholder' => '选择性别']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('industry_id', '行业') !!}
                {!! Form::text('industry_id', $info->industry_id, ['class' => 'form-control', 'placeholder' => '选择行业']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('company', '公司') !!}
                {!! Form::text('company', $info->company, ['class' => 'form-control', 'placeholder' => '填写公司名称']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('position', '职位') !!}
                {!! Form::text('position', $info->position, ['class' => 'form-control', 'placeholder' => '选择职位']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('remark', '备注') !!}
                {!! Form::text('remark', $info->remark, ['class' => 'form-control', 'placeholder' => '填写备注']) !!}
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

