<div class="d-flex justify-content-end flex-shrink-0">

    @isset($viewGate)
        @can($viewGate)
            <a href="{{ isset($primaryKey) ? route($crudRoutePart . '.show', $row[$primaryKey]) : route($crudRoutePart . '.show', $row->id) }}"
                class="btn btn-icon btn-light btn-active-dark btn-sm me-1">
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

    @if (Gate::check(['student_generate_document_evaluation']) || Gate::check(['student_generate_scholastic_data']))

        <a href="#" class="btn btn-sm btn-icon btn-light btn-active-secondary me-1" data-kt-menu-trigger="click"
            data-kt-menu-placement="bottom-end">
            <span class="svg-icon">
                <i class="fa-solid fa-file-arrow-down"></i>
            </span>
        </a>

        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-250px py-4"
            data-kt-menu="true">


            @can('student_generate_document_evaluation')
                <div class="menu-item px-3 ">
                    <a href="{{ route('admin.student.generate.envelope-document-evaluation', $row->stud_id) }}"
                        class="menu-link px-3" target="_blank">
                        <span class="menu-icon">
                            <i class="fa-duotone fa-file-pdf fs-5"></i>
                        </span>
                        <span class="menu-title">Document Evaluation</span></a>
                </div>
            @endcan

            @can('student_generate_scholastic_data')
                @if ($row->stud_recordType == 'NONSIS')
                    <div class="menu-item px-3 ">
                        <a href="{{ route('admin.student.generate.scholastic-data', $row->stud_id) }}"
                            class="menu-link px-3" target="_blank">
                            <span class="menu-icon">
                                <i class="fa-duotone fa-file-pdf fs-5"></i>
                            </span>
                            <span class="menu-title">Scholastic Data</span></a>
                    </div>
                @endif
            @endcan
        </div>
    @endif


    @isset($archiveGate)
        @can($archiveGate)
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
                        <i class="fa-solid fa-folder-arrow-down"></i>
                    </span>
                </button>
            </form>
        @endcan
    @endisset

</div>
