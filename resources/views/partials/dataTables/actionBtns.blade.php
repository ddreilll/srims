<div class="d-flex justify-content-end flex-shrink-0">

    @isset($viewGate)
        @can($viewGate)
            <a href="{{ isset($primaryKey) ? route($crudRoutePart . '.show', $row[$primaryKey]) : route($crudRoutePart . '.show', $row->id) }}"
                class="btn btn-icon btn-light btn-active-secondary btn-sm me-1">
                <span class="svg-icon">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </a>
        @endcan
    @endisset

    @isset($editGate)
        @can($editGate)
            <a href="{{ isset($primaryKey) ? route($crudRoutePart . '.edit', $row[$primaryKey]) : route($crudRoutePart . '.edit', $row->id) }}"
                class="btn btn-icon btn-light-warning btn-active-warning btn-sm me-1">
                <span class="svg-icon">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
            </a>
        @endcan
    @endisset

    @isset($deleteGate)
        @can($deleteGate)
            <form
                action="{{ isset($primaryKey) ? route($crudRoutePart . '.destroy', $row[$primaryKey]) : route($crudRoutePart . '.destroy', $row->id) }}"
                method="POST" id="{{ isset($primaryKey) ? $row[$primaryKey] : $row->id }}-{{ $resource }}-destroy">
                @method('DELETE')
                @csrf
                <button type="button" {{ $resource }}-destroy="true"
                    class="btn btn-icon btn-light-danger btn-active-danger btn-sm"
                    data-id="{{ isset($primaryKey) ? $row[$primaryKey] : $row->id }}">
                    <span class="svg-icon">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </button>
            </form>
        @endcan
    @endisset

</div>
