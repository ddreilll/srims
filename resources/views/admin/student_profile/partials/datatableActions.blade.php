<td class="text-end">
    <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
        data-kt-menu-placement="bottom-end">Actions
        <span class="svg-icon svg-icon-5 m-0">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                    fill="currentColor" />
            </svg>
        </span>
    </a>

    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-250px py-4"
        data-kt-menu="true">

        @can('student_show')
            <div class="menu-item px-3">
                <a href="{{ route('students.show', $row->stud_id) }} " class="menu-link px-3">View</a>
            </div>
        @endcan

        @can('student_edit')
            <div class="menu-item px-3 ">
                <a href="{{ url('student/profile') . '/' . $row->stud_uuid }}/edit" class="menu-link px-3">Edit</a>
            </div>
        @endcan

        @if (Gate::check(['student_generate_document_evaluation']) || Gate::check(['student_generate_scholastic_data']))

            <div class="separator my-3 opacity-75"></div>

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
        @endif

        @can('student_archive')
            <div class="separator my-3 opacity-75"></div>
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3 menu-hover-warning" kt_student_profile_table_archive>
                    <span class="menu-icon">
                        <i class="fa-duotone fa-inbox-in fs-5"></i>
                    </span>
                    <span class="menu-title">Archive</span>
                </a>
            </div>
        @endcan
    </div>
</td>
