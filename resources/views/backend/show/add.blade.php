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
					{!! Form::open(['route' => 'backend.shows.addOk', 'role' => 'form','enctype'=>'multipart/form-data']) !!}
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<div class="form-group">
									{!! Form::label('title', '路演标题') !!}
									{!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => '填写标题']) !!}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<div class="form-group">
									{!! Form::label('thumbnail', '缩略图') !!}
									{!! Form::file('thumbnail', '', ['class' => 'form-control']) !!}
								</div>
							</div>
							<div class="col-lg-6 col-xs-6">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<div class="form-group">
									{!! Form::label('viedo', '视频地址') !!}
<<<<<<< HEAD
									{!! Form::text('viedo', '', ['class' => 'form-control', 'placeholder' => '输入视频地址']) !!}
=======
									{!! Form::text('video', '', ['class' => 'form-control', 'placeholder' => '输入视频地址']) !!}
>>>>>>> 734652a658a650655775a7f6237beec51485af0a
								</div>
							</div>
							<div class="col-lg-6 col-xs-6">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<div class="form-group">
									{!! Form::label('shows_categories_id', '所属分类') !!}
<<<<<<< HEAD
									{!! Form::text('shows_categories_id', '', ['class' => 'form-control', 'placeholder' => '请选择']) !!}
=======

									{!! Form::select('shows_categories_id',
									$info
									, null, ['placeholder' => '所属分类']) !!}

>>>>>>> 734652a658a650655775a7f6237beec51485af0a
								</div>
							</div>
							<div class="col-lg-6 col-xs-6">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-xs-12">
								<p style='width:auto; padding-left:0; float:left;'>
									<script id="container" name="content" type="text/plain"></script>
								</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
<<<<<<< HEAD
						<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">关闭</button>
=======

>>>>>>> 734652a658a650655775a7f6237beec51485af0a
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

