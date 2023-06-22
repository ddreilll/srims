<div class="d-flex justify-content-end flex-shrink-0">

    @if($viewGate)
        <a href="{{ route('settings.' . $crudRoutePart . '.show', $row[$primaryKey]) }}"
            class="btn btn-icon btn-light btn-active-secondary btn-sm me-1">
            <span class="svg-icon">
                <i class="fa-solid fa-eye"></i>
            </span>
        </a>
    @endif

    @if($editGate)
        <a href="{{ route('settings.' . $crudRoutePart . '.edit', $row[$primaryKey]) }}"
            class="btn btn-icon btn-light-warning btn-active-warning btn-sm me-1">
            <span class="svg-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </span>
        </a>
    @endif

    @if($deleteGate)
        <form action="{{ route('settings.' . $crudRoutePart . '.destroy', $row[$primaryKey]) }}" method="POST"
            id="{{ $row[$primaryKey] }}-destroy">
            @method('DELETE')
            @csrf
            <button type="button" {{ $crudRoutePart }}-component="deleteBtn"
                class="btn btn-icon btn-light-danger btn-active-danger btn-sm" data-id="{{ $row[$primaryKey] }}">
                <span class="svg-icon">
                    <i class="fa-solid fa-trash"></i>
                </span>
            </button>
        </form>
    @endif

</div>
