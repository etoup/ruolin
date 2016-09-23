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
                        <!--修改分类开始-->
                        {!! Form::open(['route' => 'backend.shows.editCateOk', 'role' => 'form']) !!}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('title', '分类名称') !!}
                                        {!! Form::text('title', $info->title, ['class' => 'form-control', 'placeholder' => '填写分类名称']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('types', '分类编号') !!}
                                        {!! Form::text('types', $info->types, ['class' => 'form-control', 'placeholder' => '填写1-100']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xs-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-xs-6">
                                    <div class="form-group">
                                        {!! Form::label('sort', '排序') !!}
                                        {!! Form::text('sort', $info->sort, ['class' => 'form-control', 'placeholder' => '排序1-255']) !!}
                                    </div>
                                </div>

                                <div class="col-lg-6 col-xs-6">
                                </div>
                            </div>

                        </div>
                        {!! Form::hidden('id', $info->id) !!}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
                            <button type="submit" class="btn btn-primary btn-flat">提交</button>
                        </div>
                        {!! Form::close() !!}
                                <!--修改分类结束-->

                    </div>
                </div>
            </div>
        </ul>
    </div>
@endsection

