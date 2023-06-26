<button type="submit" class="btn btn-primary ms-1 {{ isset($className) ? $className : '' }}" {{ $resource }}-store="true"
    @if (isset($formId)) data-id="{{ $formId }}" @endif>
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-paper-plane me-1"></i>' !!}
    {{ isset($resourceAction) ? $resourceAction : __('global.submit') }}
    {{ isset($resourceDisplay) ? $resourceDisplay : '' }}
</button>
