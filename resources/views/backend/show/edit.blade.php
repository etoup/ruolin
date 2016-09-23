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
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">添加路演</a></li>
            <div  id="create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['route' => 'backend.shows.editOk', 'role' => 'form','enctype'=>'multipart/form-data']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('project_id', '选择项目') !!}
                                        {!! Form::select('project_id',
                                        $data
                                        ,$info->project_id, ['placeholder' => '选择项目','class' => 'form-control select2','style'=>'width: 100%']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('purpose', '预期目标') !!}
                                        {!! Form::select('purpose',
                                        [1=>'推广新品',2=>'开业宣传',3=>'项目融资',4=>'其他'],
                                        $info->purpose, ['class' => 'form-control select2','style'=>'width: 100%']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('shows_categories_id', '所属分类') !!}
                                        {!! Form::select('shows_categories_id',
                                        $cate
                                        , $info->shows_categories_id, ['class' => 'form-control select2','style'=>'width: 100%','placeholder' => '所属分类']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('program', '路演方案') !!}
                                        {!! Form::text('program',$info->program, ['placeholder' => '路演方案','class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('times', '路演场次') !!}
                                        {!! Form::text('times',$info->times, ['placeholder' => '路演场次','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('area', '路演区域') !!}
                                        {!! Form::text('area',$info->area, ['placeholder' => '路演区域','class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('scale', '路演规模') !!}
                                        {!! Form::text('scale',$info->scale, ['placeholder' => '路演规模','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('guest', '路演嘉宾') !!}
                                        {!! Form::text('guest',$info->guest, ['placeholder' => '路演嘉宾','class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('price', '预期费用') !!}
                                        {!! Form::text('price',$info->price, ['placeholder' => '预期费用','class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('title', '路演标题') !!}
                                        {!! Form::text('title', $info->title, ['class' => 'form-control', 'placeholder' => '填写标题']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('thumbnail', '缩略图') !!}
                                        {!! Form::file('thumbnail', ['class' => 'form-control']) !!}
                                        {!! Form::hidden('thumbnail_url',$info->thumbnail, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        <img src="{{$info->thumbnail}}" width="25px" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('viedo', '视频地址') !!}
                                        {!! Form::text('video', '', ['class' => 'form-control', 'placeholder' => '输入视频地址']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('status', '审核状态') !!}
                                        {!! Form::select('status',
                                        [0=>'未审核',1=>'已审核',2=>'已发布']
                                        ,$info->status, ['placeholder' => '选择项目','class' => 'form-control select2','style'=>'width: 100%']) !!}
                                </div>
                            </div>
                                <div class="col-lg-6 col-xs-6"></div>
                                </div>
                            <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                    <p style='width:auto; padding-left:0; float:left;'>
                                        <script id="container" name="content" type="text/plain">
                                            {!! $info->content !!}
                                        </script>

                                    </p>
                                </div>
                            </div>
                        </div>
                        {!! Form::hidden('id', $info->id) !!}
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-flat">提交</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </ul>
    </div>
    <script type="text/javascript" src="/plugins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/plugins/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">
        var ue =UE.getEditor('container');
    </script>
@endsection

