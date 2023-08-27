<div class="d-flex justify-content-end flex-shrink-0">

    @isset($viewGate)
        @can($viewGate)
            <a href="{{ isset($primaryKey) ? route('admin.gradesheet.show', $row[$primaryKey]) : route('admin.gradesheet.show', $row->id) }}"
                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse"
                title="{{ __('global.view') }}" class="btn btn-icon btn-light btn-active-dark btn-sm me-1">
                <span class="svg-icon">
                    <i class="fa-solid fa-eye"></i>
                </span>
            </a>
        @endcan
    @endisset

    @isset($editGate)
        @can($editGate)
            <a href="{{ isset($primaryKey) ? route('admin.gradesheet.edit', $row[$primaryKey]) : route('admin.gradesheet.edit', $row->id) }}"
                class="btn btn-icon btn-light-warning btn-active-warning btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse"
                title="{{ __('global.edit') }}">
                <span class="svg-icon">
                    <i class="fa-solid fa-pen-to-square"></i>
                </span>
            </a>
        @endcan
    @endisset

    @can('gradesheet_generate')
        <a href="{{ isset($primaryKey) ? route('admin.gradesheet.generate.pdf', $row[$primaryKey]) : route('admin.gradesheet.generate.pdf', $row->id) }}"
            class="btn btn-sm btn-icon btn-light btn-active-secondary me-1" target="_blank" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse"
            title="{{ __('global.export') }} {{ __('cruds.gradesheet.title_singular') }}">
            <span class="svg-icon">
                <i class="fa-solid fa-file-arrow-down"></i>
            </span>
        </a>
    @endcan

    @isset($deleteGate)
        @can($deleteGate)
            @php
                $formId = bin2hex(random_bytes(5));
            @endphp

            <form
                action="{{ isset($primaryKey) ? route('gradesheets.destroy', $row[$primaryKey]) : route('gradesheets.destroy', $row->id) }}"
                method="POST" id="{{ $formId }}-{{ $resource }}-destroy" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-inverse"
                title="{{ __('global.delete') }}">
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
