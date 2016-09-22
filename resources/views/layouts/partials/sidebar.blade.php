<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{config('app.url')}}/img/avatar.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ active_class(if_uri(['backend'])) }}"><a href="{{ url('backend') }}"><i class='fa fa-dashboard'></i> <span>控制台</span></a></li>

            <li class="{{ active_class(if_uri_pattern(['backend/users','backend/users/review'])) }} treeview">

                <a href="#"><i class='fa fa-user'></i> <span>会员管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">

                    <li class="{{ active_class(if_uri(['backend/users'])) }}"><a href="{{ route('backend.users') }}"><i class="fa fa-circle-o"></i> 会员列表</a></li>

                    <li class="{{ active_class(if_uri(['backend/users/review'])) }}"><a href="{{ route('backend.users.review') }}"><i class="fa fa-circle-o"></i> 会员审核</a></li>
                </ul>
            </li>
            <li class="{{ active_class(if_uri_pattern(['backend/projects','backend/regions','backend/industries','backend/quotas'])) }} treeview">
                <a href="#"><i class='fa fa-tasks'></i> <span>项目管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_uri(['backend/projects'])) }}"><a href="{{ route('backend.projects') }}"><i class="fa fa-circle-o"></i> 项目列表</a></li>
                    <li class="{{ active_class(if_uri(['backend/regions'])) }}"><a href="{{ route('backend.regions') }}"><i class="fa fa-circle-o"></i> 地区管理</a></li>
                    <li class="{{ active_class(if_uri(['backend/industries'])) }}"><a href="{{ route('backend.industries') }}"><i class="fa fa-circle-o"></i> 行业管理</a></li>
                    <li class="{{ active_class(if_uri(['backend/quotas'])) }}"><a href="{{ route('backend.quotas') }}"><i class="fa fa-circle-o"></i> 额度管理</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-pencil'></i> <span>文章管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
            <li class="{{ active_class(if_uri_pattern(['backend/shows','backend/shows/categories'])) }} treeview">

                <a href="#"><i class='fa fa-video-camera'></i> <span>路演管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li class="{{ active_class(if_uri(['backend/shows'])) }}"><a href="{{ route('backend.shows') }}"><i class="fa fa-circle-o"></i>路演列表</a></li>

                    <li class="{{ active_class(if_uri(['backend/shows/categories'])) }}"><a href="{{ route('backend.shows.categories') }}"><i class="fa fa-circle-o"></i>路演分类</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-sitemap'></i> <span>联董管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-reorder'></i> <span>日志管理</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> {{ trans('adminlte_lang::message.linklevel2') }}</a></li>
                </ul>
            </li>
            <li class="header">快捷导航</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>项目审核</span></a></li>

            <li ><a href="{{ route('backend.shows') }}"><i class="fa fa-circle-o text-yellow"></i> <span>路演审核</span></a></li>

            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>联董审核</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
