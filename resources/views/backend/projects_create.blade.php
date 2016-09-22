{!! Form::open(['route' => 'backend.projects.created', 'role' => 'form']) !!}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
    <h4 class="modal-title">新增项目</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('name', '姓名') !!}
                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '填写姓名']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('ways', '联系方式') !!}
                {!! Form::text('ways', '', ['class' => 'form-control', 'placeholder' => '填写联系方式']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('card', '身份证号码') !!}
                {!! Form::text('card', '', ['class' => 'form-control', 'placeholder' => '身份证号码']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('business_name', '企业名称') !!}
                {!! Form::text('business_name', '', ['class' => 'form-control', 'placeholder' => '填写企业名称']) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('regions_id', '地区') !!}
                {!! Form::select('regions_id', $regions, null, ['placeholder' => '选择地区','class'=> 'form-control select2','style'=>'width: 100%']); !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('address', '详细地址') !!}
                {!! Form::text('address', '', ['class' => 'form-control', 'placeholder' => '填写详细地址']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('industries_id', '行业') !!}
                {!! Form::select('industries_id', $industries, null, ['placeholder' => '选择行业','class'=> 'form-control select2','style'=>'width: 100%']); !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('quotas_id', '额度') !!}
                {!! Form::select('quotas_id', $quotas, null, ['placeholder' => '选择额度','class'=> 'form-control select2','style'=>'width: 100%']); !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('types', '项目类型') !!}
                {!! Form::select('types', $types, 0, ['placeholder' => '选择项目类型','class'=> 'form-control select2','style'=>'width: 100%']); !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('has_stores', '是否有实体店？') !!}
                {!! Form::select('has_stores', $has_stores, 0, ['placeholder' => '选择是否有实体店','class'=> 'form-control select2','style'=>'width: 100%']); !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('cycle', '收益回报期') !!}
                {!! Form::text('cycle', '', ['class' => 'form-control', 'placeholder' => '填写收益回报期']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('information', '商户备案信息') !!}
                {!! Form::text('information', '', ['class' => 'form-control', 'placeholder' => '商户备案信息']) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xs-6">
            <div class="form-group">
                {!! Form::label('brand_name', '品牌名称') !!}
                {!! Form::text('brand_name', '', ['class' => 'form-control', 'placeholder' => '填写品牌名称']) !!}
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('describe', '品牌描述') !!}
                <textarea class="textarea" name="describe" placeholder="填写品牌描述" style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('characteristic', '项目特色') !!}
                <textarea class="textarea" name="characteristic" placeholder="填写项目特色" style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="form-group">
                {!! Form::label('policy', '招商政策') !!}
                <textarea class="textarea" name="policy" placeholder="填写招商政策" style="width: 100%; height: 120px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

            </div>
        </div>
    </div>


</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
    <button type="submit" class="btn btn-primary btn-flat">新增项目</button>
</div>
{!! Form::close() !!}

<script src="{{ asset('/plugins/select2/select2.full.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script>
    $(".select2").select2();
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
</script>