KTUtil.onDOMContentLoaded((function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.extend(true, $.fn.dataTable.defaults, {
        responsive: {
            details: {
                renderer: function (api, rowIdx, columns) {

                    var dl = $('<dl class="row" style="font-size: .9rem" />');

                    columns.forEach((col, i) => {
                        if (col.hidden) {
                            col.title = (col.title).trim();
                            $(dl).append(`<dt class="col-5">${(col.title && col.title != "&nbsp;") ? col.title + ':' : ''}</dt><dd class="col-7">${col.data}</dd>`);
                        }
                    });

                    return columns.length >= 1 ? dl : false;
                }
            }
        },
        language: {
            buttons: {
                pageLength: {
                    _: "Show %d entries",
                    '-1': "Show All"
                }
            }
        },
        columnDefs: [{
            orderable: false,
            searchable: false,
            responsivePriority: 2,
            targets: -1
        }, {
            responsivePriority: 1,
            targets: 0
        },],
        pageLength: 10,
    });

    $(`[destroy-resource="true"]`).on("click", function () {

        var documentId = $(this).attr("data-id");

        Swal.fire({
            text: "Are you sure you would like to Delete?",
            icon: 'warning',
            showCancelButton: !0,
            buttonsStyling: !1,
            confirmButtonText: "Yes, Delete it",
            cancelButtonText: "No, return",
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-active-light',
            },
        }).then(function (t) {
            if (t.value) {
                $(`form#${documentId}-destroy`).submit();
            }
        });
    });
}));