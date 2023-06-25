<button type="submit" class="btn btn-primary ms-1 {{ isset($className) ? $className : '' }}">
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-paper-plane me-1"></i>' !!}
    {{ __('global.submit') }}
</button>
