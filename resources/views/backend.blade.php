@extends('layouts.app')

@section('htmlheader_title')
	Backend
@endsection


@section('main-content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Backend</div>

				<div class="panel-body">
					{{ trans('adminlte_lang::message.logged') }}
				</div>
			</div>
		</div>
	</div>
@endsection
