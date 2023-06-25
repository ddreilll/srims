<button type="submit" class="btn btn-primary ms-1 {{ isset($className) ? $className : '' }}">
    {!! isset($icon) ? $icon : '<i class="fa-solid fa-floppy-disk me-1"></i>' !!}
    {{ __('global.save_changes') }}
</button>
