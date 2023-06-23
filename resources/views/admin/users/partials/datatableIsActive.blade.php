<form action="{{ route('users.update-status', $row->id) }}" method="POST" id="{{ $row->id }}-user-update-status">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-check form-switch">
        <input type='hidden' name="is_active" value='{{ $row->is_active ? '0' : '1' }}'>
        <input class="form-check-input" type="checkbox" {{ $row->is_active ? 'checked' : '' }}
            data-id="{{ $row->id }}"
            @if (auth()->user()->id != $row->id) user-update-status="true" @else disabled @endif />
    </div>
</form>
