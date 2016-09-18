<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', '主要标题')
        <small>@yield('contentheader_description','副标题')</small>
    </h1>

    {!! Breadcrumbs::renderIfExists() !!}
</section>