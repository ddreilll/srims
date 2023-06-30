<a href="{{ $editRoute }}" class="btn btn-warning ms-1 {{ isset($className) ? $className : '' }}">
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-pen-to-square me-1"></i>' !!}
    {{ isset($resourceAction) ? $resourceAction : __('global.edit') }}
    {{ isset($resourceDisplay) ? $resourceDisplay : '' }}
</a>
