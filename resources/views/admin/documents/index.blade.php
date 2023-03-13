@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-document-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Document" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_document">Add Document</button>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">

                    <table id="kt_documents_table" class="table table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Types</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_add_document" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_add_document_form">

                    <div class="modal-header" id="kt_modal_add_document_header">
                        <h2 class="fw-bolder">Add Document</h2>
                        <div id="kt_modal_add_document_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_document_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_document_header"
                            data-kt-scroll-wrappers="#kt_modal_add_document_scroll" data-kt-scroll-offset="300px">

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                            </div>

                            <div id="kt_modal_add_document_types_list" class="mb-10">
                                <label class="fs-6 fw-bold mb-2">Types</label>

                                <div class="row">

                                    <div class="col-10">
                                        <input placeholder="" name="type[0][name]" class="form-control form-control-solid">
                                    </div>

                                    <div class="col-2 d-flex flex-center">
                                        <button kt_modal_add_document_types_list_addBtn type="button"
                                            class="btn btn-icon btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>

                                <div id="kt_modal_add_document_types_list_template" class="row mt-7"
                                    style="display: none !important">

                                    <div class="col-10">
                                        <input placeholder="" data-name="type.name" class="form-control form-control-solid">
                                    </div>

                                    <div class="col-2 d-flex flex-center">
                                        <button kt_modal_add_document_types_list_removeBtn type="button"
                                            class="btn btn-icon btn-secondary btn-sm"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Category</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a category" data-dropdown-parent="#kt_modal_add_document_form"
                                    name="category">
                                    <option></option>
                                    <option value="ENTRANCE">Entrance</option>
                                    <option value="RECORDS">Records</option>
                                    <option value="EXIT">Exit</option>
                                </select>
                            </div>

                            <div class="fv-row mb-15">
                                <label class="fs-6 fw-bold mb-2">Description</label>
                                <textarea class="form-control form-control-solid" placeholder="Type the description here" style="height: 100px"
                                    name="description"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_document_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_add_document_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_edit_documents" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_edit_document_form">
                    <input type="text" name="id" hidden />

                    <div class="modal-header" id="kt_modal_edit_documents_header">
                        <h2 class="fw-bolder">Edit Document</h2>
                        <div id="kt_modal_edit_documents_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="modal-body py-10 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_documents_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_edit_documents_header"
                            data-kt-scroll-wrappers="#kt_modal_edit_documents_scroll" data-kt-scroll-offset="300px">

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                            </div>

                            <div id="kt_modal_edit_document_types_list" class="mb-10">
                                <label class="fs-6 fw-bold mb-2">Types</label>

                                <div class="row">

                                    <div class="col-10">
                                        <input placeholder="" name="type[0][name]" class="form-control form-control-solid">
                                    </div>

                                    <div class="col-2 d-flex flex-center">
                                        <button kt_modal_edit_document_types_list_addBtn type="button"
                                            class="btn btn-icon btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>

                                <div id="kt_modal_edit_document_types_list_template" class="row mt-7"
                                    style="display: none !important">

                                    <div class="col-10">
                                        <input placeholder="" data-name="type.name" class="form-control form-control-solid">
                                    </div>

                                    <div class="col-2 d-flex flex-center">
                                        <button kt_modal_edit_document_types_list_removeBtn type="button"
                                            class="btn btn-icon btn-secondary btn-sm"><i
                                                class="fas fa-minus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Category</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a category" data-dropdown-parent="#kt_modal_edit_document_form"
                                    name="category">
                                    <option></option>
                                    <option value="ENTRANCE">Entrance</option>
                                    <option value="RECORDS">Records</option>
                                    <option value="EXIT">Exit</option>
                                </select>
                            </div>

                            <div class="fv-row mb-15">
                                <label class="fs-6 fw-bold mb-2">Description</label>
                                <textarea class="form-control form-control-solid" placeholder="Type the description here" style="height: 100px"
                                    name="description"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_edit_documents_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_edit_documents_submit" class="btn btn-primary">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            const retrieveFormData = function(formAction) {
                return $("#kt_modal_" + formAction + "_document_form").serialize();
            }

            const resetFormData = function(formAction) {
                $('#kt_modal_' + formAction + '_document_form .form-control-solid').val('');
                $('#kt_modal_' + formAction + '_document_form .form-select-solid').val('').trigger(
                    'change');
            }

            var table = $("#kt_documents_table").DataTable({
                    processing: true,
                    ajax: {
                        url: "{{ url('/documents/retrieveAll') }}",
                        dataSrc: function(d) {

                            var return_data = new Array();

                            for (let i = 0; i < d.length; i++) {

                                let types = d[i]["types"];
                                let typesArray = new Array();

                                for (let b = 0; b < types.length; b++) {
                                    typesArray.push([types[b]['docuType_name']]);
                                }

                                return_data.push({
                                        DT_RowId: d[i]["docu_id_md5"],
                                        Name: d[i]["docu_name"],
                                        Description: d[i]["docu_description"],
                                        Category: d[i]["docu_category"],
                                        Types: typesArray.join(", "),
                                    Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                    <a href="javascript:void(0)" kt_table_document_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="javascript:void(0)" kt_table_document_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                </div>`,
                                });

                        };

                        return return_data;
                    },
                    error: function(xhr, error, code) {

                        display_modal_error_reload("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'Name'
                    },
                    {
                        data: 'Description'
                    },
                    {
                        data: 'Category'
                    },
                    {
                        data: 'Types'
                    },
                    {
                        data: 'Action'
                    },
                ],
            });

        $('[data-kt-document-table-filter="search"]').on('keyup', function(e) {
            table.search(e.target.value).draw();
        });

        var form_fields = {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Document name is required'
                    },
                },
            },
            'category': {
                validators: {
                    notEmpty: {
                        message: 'Document category is required'
                    },
                },
            }
        };




        const add_removeType = (rowIndex) => {

            $("#kt_modal_add_document_types_list").find(
                'div[data-row-index="' + rowIndex + '"]').remove();
        }

        const add_resetDocuTypeData = function() {

            docuTypeRows = $("#kt_modal_add_document_types_list").find(
                'div[data-row-index]');

            if (docuTypeRows.length >= 1) {
                for (let index = 0; index < docuTypeRows.length; index++) {

                    let rowIndex = $(docuTypeRows[index]).attr('data-row-index');
                    add_removeType(rowIndex);
                }
            }

            $("#kt_modal_add_document_types_list input").val("");
        }

        let add_rowIndex = 0;

        var add_modal = init_modal("kt_modal_add_document");
        var add_submitBtnId = "kt_modal_add_document_submit";
        var add_formValidation = init_formValidation("kt_modal_add_document_form", form_fields);

        $('#kt_modal_add_document_cancel, #kt_modal_add_document_close').on("click", function(t) {
            t.preventDefault();

            Swal.fire({
                text: "{{ __('modal.confirmation', ['action' => 'cancel']) }}",
                icon: 'warning',
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'cancel']) }}",
                cancelButtonText: "{{ __('modal.cancel_btn') }}",
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-active-light',
                },
            }).then(function(t) {

                if (t.value) {

                    resetFormData("add");
                    add_modal.hide();
                }
            });
        });

        $("#kt_modal_add_document_form").on("submit", function(e) {

            e.preventDefault();

            add_formValidation.validate().then(function(e) {

                if ('Valid' == e) {

                    trigger_btnIndicator(add_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/documents/add') }}",
                        data: retrieveFormData("add"),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        trigger_btnIndicator(add_submitBtnId, "default");
                        if (respond.status == 200) {

                            display_axios_success(respond.data.message);
                            add_modal.hide();
                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                        }

                        resetFormData("add");
                        add_resetDocuTypeData();
                        table.ajax.reload();
                    }).catch(function(error) {

                        display_axios_error(error);
                    });
                } else {

                    display_modal_error("{{ __('modal.error') }}");
                }
            });
        });

        $("#kt_modal_add_document_types_list button[kt_modal_add_document_types_list_addBtn]").on(
            "click",
            function() {

                const add_typeTemplate = $("#kt_modal_add_document_types_list_template");
                add_rowIndex++;

                const clone = add_typeTemplate.clone(true);
                clone.removeAttr("id");

                clone.attr("style", "");
                clone.attr("data-row-index", add_rowIndex);

                clone.insertBefore(add_typeTemplate);

                $(clone).find('[data-name="type.name"]').attr("name", "type[" + add_rowIndex +
                    "][name]");

                const removeBtn = clone.find(
                    'button[kt_modal_add_document_types_list_removeBtn]');
                removeBtn.attr('data-row-index', add_rowIndex);

                $(removeBtn).on('click', function(e) {

                    const index = $(this).attr('data-row-index');
                    add_removeType(index);
                })
            });

        $("#kt_modal_add_document").on('show.bs.modal', function(e) {
            add_resetDocuTypeData();
        });





        let edit_rowIndex = 0;

        const edit_removeType = (rowIndex) => {

            $("#kt_modal_edit_document_types_list").find(
                'div[data-row-index="' + rowIndex + '"]').remove();
        }

        const edit_addType = (rowIndex, fieldValue = null) => {

            const edit_typeTemplate = $("#kt_modal_edit_document_types_list_template");

            const clone = edit_typeTemplate.clone(true);
            clone.removeAttr("id");

            clone.attr("style", "");
            clone.attr("data-row-index", edit_rowIndex);


            clone.insertBefore(edit_typeTemplate);

            $(clone).find('[data-name="type.name"]').attr("name", "type[" + edit_rowIndex +
                "][name]");

            if (fieldValue) {
                $(clone).find('[data-name="type.name"]').val(fieldValue.docuType_name);
            }

            const removeBtn = clone.find(
                'button[kt_modal_edit_document_types_list_removeBtn]');
            removeBtn.attr('data-row-index', edit_rowIndex);

            $(removeBtn).on('click', function(e) {

                const index = $(this).attr('data-row-index');
                edit_removeType(index);
            })
        }

        const edit_resetDocuTypeData = function() {

            docuTypeRows = $("#kt_modal_edit_document_types_list").find(
                'div[data-row-index]');

            if (docuTypeRows.length >= 1) {
                for (let index = 0; index < docuTypeRows.length; index++) {

                    let rowIndex = $(docuTypeRows[index]).attr('data-row-index');
                    edit_removeType(rowIndex);
                }
            }

            $("#kt_modal_edit_document_types_list input").val("");
        }

        var edit_modal = init_modal("kt_modal_edit_documents");
        var edit_submitBtnId = "kt_modal_edit_documents_submit";
        var edit_formValidation = init_formValidation("kt_modal_edit_document_form", form_fields);

        $("#kt_documents_table").on("click", "[kt_table_document_edit]", function() {

            const id = $(this).closest("tr").attr("id");

            edit_resetDocuTypeData();
            axios({
                method: "POST",
                url: "{{ url('/documents/retrieve') }}",
                data: {
                    id
                },
                timeout: "{{ $axios_timeout }}"
            }).then(function(respond) {

                if (respond.status == 200) {

                    if (respond.data.length == 1) {

                        d = respond.data[0];

                        $("#kt_modal_edit_document_form [name='id']").val(d['docu_id_md5']);
                        $("#kt_modal_edit_document_form [name='name']").val(d['docu_name']);
                        $("#kt_modal_edit_document_form [name='category']").val(d[
                                'docu_category'])
                            .trigger("change");
                        $("#kt_modal_edit_document_form [name='description']").val(d[
                            'docu_description']);

                        dt = d['types'];
                        if (dt.length >= 1) {

                            $("#kt_modal_edit_document_types_list").find(
                                "input[name='type[0][name]']").val(dt[0].docuType_name);
                            dt.shift();

                            dt.forEach(t => {
                                edit_rowIndex++;
                                edit_addType(edit_rowIndex, t);
                            });
                        }

                        edit_modal.show();
                    } else {

                        display_modal_error("{{ __('modal.error') }}");
                    }

                } else {

                    display_modal_error("{{ __('modal.error') }}");
                }
            }).catch(function(error) {

                display_axios_error(error);
            });
        });

        $('#kt_modal_edit_documents_cancel, #kt_modal_edit_documents_close').on("click", function(t) {

            t.preventDefault();

            Swal.fire({
                text: "{{ __('modal.confirmation', ['action' => 'cancel']) }}",
                icon: 'warning',
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'cancel']) }}",
                cancelButtonText: "{{ __('modal.cancel_btn') }}",
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-active-light',
                },
            }).then(function(t) {
                if (t.value) {
                    resetFormData("edit");
                    edit_modal.hide();
                }
            });
        });

        $("#kt_modal_edit_document_form").on("submit", function(e) {

            e.preventDefault();

            edit_formValidation.validate().then(function(e) {

                if ('Valid' == e) {

                    trigger_btnIndicator(edit_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/documents/update') }}",
                        data: retrieveFormData("edit"),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        if (respond.status == 200) {

                            trigger_btnIndicator(edit_submitBtnId, "default");
                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                                edit_modal.hide();
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            resetFormData("edit");
                            table.ajax.reload();
                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                        }
                    }).catch(function(error) {
                        display_axios_error(error);
                    });
                } else {
                    display_modal_error("{{ __('modal.error') }}");
                }
            });
        });

        $("#kt_modal_edit_document_types_list button[kt_modal_edit_document_types_list_addBtn]").on(
            "click",
            function() {

                edit_rowIndex++;
                edit_addType(edit_rowIndex);
            });


        $("#kt_documents_table").on("click", "[kt_table_document_delete]",
            function() {

                const id = $(this).closest("tr").attr("id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'delete']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    allowOutsideClick: false,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'delete']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.isConfirmed) {

                        axios({
                            method: "POST",
                            url: "{{ url('/documents/delete') }}",
                            data: {
                                id
                            },
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {
                            if (respond.status == 200) {

                                display_toastr_info(respond.data.message);
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            table.ajax.reload();
                        }).catch(function(error) {
                            display_axios_error(error);
                        });

                    }
                });

            });
        }));
    </script>
@endsection
