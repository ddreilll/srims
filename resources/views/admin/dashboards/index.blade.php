<x-default-layout title="Dashboard" pageTitle="Dashboard">

    <x-slot:breadcrumbs>
        {{ Breadcrumbs::render('dashboard') }}
    </x-slot:breadcrumbs>

    <x-slot:content>
        <div class="row g-5 g-xl-8">
            <div class="col-xl-4">
                <div class="card mb-0">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">Total Students per Year</span>
                            <span class="text-muted fw-bold fs-7">Total of <span id="total_students_info"></span>
                                students</span>
                        </h3>
                    </div>
                    <div class="card-body pt-0">
                        <table id="kt_dashboard_1_student_count"
                            class="align-middle table table-row-bordered gy-7 gs-10">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th data-priority="1">Academic Year</th>
                                    <th data-priority="2">Total</th>
                                </tr>
                            </thead>
                            <tbody class="fw-bold">

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-xl-8">
                <div class="card bg-primary h-100" data-bs-theme="light">
                    <!--begin::Body-->
                    <div class="card-body d-flex flex-column pt-13 pb-14 ">
                        <!--begin::Heading-->
                        <div class="my-auto">
                            <!--begin::Illustration-->
                            <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-60px mh-50px my-5 mb-lg-12 mb-10"
                                style="background-image:url('{{ asset('/assets/media/logo/logo_main.png') }}')"></div>
                            <!--end::Illustration-->

                            <!--begin::Title-->
                            <h1 class="fw-bold text-center text-white fs-2qx">Streamline. Retrieve. Excel.
                                <br />
                                <span class="fw-semibold text-white fs-3">Your Student Journey,
                                    Digitally Empowered</span>
                            </h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                    </div>
                    <!--end::Body-->
                </div>
            </div>

        </div>
    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            KTUtil.onDOMContentLoaded((function() {

                var table = $("#kt_dashboard_1_student_count").DataTable({
                    dom: 'rtpi',
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    pageLength: 5,
                    ajax: {
                        url: "{{ url('ajax/student-per-year') }}",
                        dataSrc: (e) => {

                            $("#total_students_info").text(e.stud_totalRecords);
                            return e.data;
                        },
                    },
                    columns: [{
                            data: 'stud_yearOfAdmission',
                            name: 'stud_yearOfAdmission'
                        },
                        {
                            data: 'stud_count',
                            name: 'stud_count'
                        }
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });
            }))
        </script>
    </x-slot:scripts>

</x-default-layout>
