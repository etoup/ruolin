<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', '主要标题')
        <small>@yield('contentheader_description','副标题')</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('adminlte_lang::message.level') }}</a></li>
        <li class="active">{{ trans('adminlte_lang::message.here') }}</li>
    </ol>
</section>