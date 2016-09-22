@extends('layouts.app')

@section('htmlheader_title')
	联董管理
@endsection
@section('contentheader_title')
	联董管理
@endsection
@section('contentheader_description')
	联董列表
@endsection


@section('main-content')
	<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab">添加联董</a></li>
		<div  id="create" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog">
				<div class="modal-content">
					{!! Form::open(['route' => 'backend.Cochairman.addOk', 'role' => 'form','enctype'=>'multipart/form-data']) !!}
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-xs-6">
								<div class="form-group">
									{!! Form::label('userid', '用户ID') !!}
									{!! Form::text('userid', '', ['class' => 'form-control', 'placeholder' => '填写用户ID']) !!}
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-flat">提交</button>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</ul>
</div>
@endsection

