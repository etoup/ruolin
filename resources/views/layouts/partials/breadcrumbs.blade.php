
@if ($breadcrumbs)
    <ol class="breadcrumb">

        @foreach ($breadcrumbs as $breadcrumb)
            @if (!$breadcrumb->last)
                <li><i class="fa fa-dashboard"></i> <a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
            @else
                <li class="active">{{{ $breadcrumb->title }}}</li>
            @endif
        @endforeach
    </ol>
@endif