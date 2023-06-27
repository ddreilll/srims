<button type="submit" class="btn btn-primary ms-1 {{ isset($className) ? $className : '' }}"
    @if (isset($resource)) {{ $resource }}-store="true" @endif
    @if (isset($formId)) data-id="{{ $formId }}" @endif>
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-paper-plane me-1"></i>' !!}
    {{ isset($resourceAction) ? $resourceAction : __('global.submit') }}
    {{ isset($resourceDisplay) ? $resourceDisplay : '' }}
</button>
