<a href="{{ $createRoute }}" class="btn btn-primary ms-1 {{ isset($className) ? $className : '' }}">
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-plus me-1"></i>' !!}
    {{ isset($resourceAction) ? $resourceAction : __('global.add') }}
    {{ isset($resourceDisplay) ? $resourceDisplay : '' }}
</a>
