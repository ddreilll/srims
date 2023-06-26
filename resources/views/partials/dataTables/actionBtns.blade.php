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

    @isset($exportGate)
        @can($exportGate)
            <a href="{{ isset($primaryKey) ? route($crudRoutePart . '.export', $row[$primaryKey]) : route($crudRoutePart . '.export', $row->id) }}"
                class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                <span class="svg-icon">
                    <i class="fa-solid fa-download"></i>
                </span>
            </a>
        @endcan
    @endisset

    @isset($deleteGate)
        @can($deleteGate)
            @php
                $formId = bin2hex(random_bytes(5));
            @endphp

            <form
                action="{{ isset($primaryKey) ? route($crudRoutePart . '.destroy', $row[$primaryKey]) : route($crudRoutePart . '.destroy', $row->id) }}"
                method="POST" id="{{ $formId }}-{{ $resource }}-destroy">
                @method('DELETE')
                @csrf
                <button type="button" {{ $resource }}-destroy="true"
                    class="btn btn-icon btn-light-danger btn-active-danger btn-sm" data-id="{{ $formId }}">
                    <span class="svg-icon">
                        <i class="fa-solid fa-trash"></i>
                    </span>
                </button>
            </form>
        @endcan
    @endisset

</div>
