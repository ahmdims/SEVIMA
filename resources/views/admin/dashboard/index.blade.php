@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content  flex-column-fluid ">

                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <!--begin::Row-->
                    <div class="row g-5 gx-xl-10">
                        <!--begin::Col-->
                        <div class="col-xxl-6 mb-md-5 mb-xl-10">
                            <!--begin::Row-->
                            <div class="row g-5 g-xl-10">
                                <!--begin::Col-->
                                <div class="col-md-6 col-xl-6 mb-xxl-10">
                                    <!--begin::Card widget 8-->
                                    <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                        <!--begin::Card body-->
                                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                            <!--begin::Statistics-->
                                            <div class="mb-4 px-9">
                                                <!--begin::Info-->
                                                <div class="d-flex align-items-center mb-2">
                                                    <!--begin::Currency-->
                                                    <span
                                                        class="fs-4 fw-semibold text-gray-500 align-self-start me-1>">$</span>
                                                    <!--end::Currency-->


                                                    <!--begin::Value-->
                                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">69,700</span>
                                                    <!--end::Value-->

                                                    <!--begin::Label-->
                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                                        2.2% </span>

                                                    <!--end::Label-->
                                                </div>

                                                <span class="fs-6 fw-semibold text-gray-500">Total Online
                                                    Sales</span>
                                            </div>

                                            <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div>
                                        </div>
                                    </div>

                                    <div class="card card-flush h-md-50 mb-xl-10">
                                        <div class="card-header pt-5">
                                            <div class="card-title d-flex flex-column">
                                                <div class="d-flex align-items-center">
                                                    <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">1,836</span>

                                                    <span class="badge badge-light-danger fs-base">
                                                        <i class="ki-outline ki-arrow-down fs-5 text-danger ms-n1"></i>
                                                        2.2%
                                                    </span>
                                                </div>

                                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Total
                                                    Sales</span>
                                            </div>
                                        </div>

                                        <div class="card-body d-flex align-items-end pt-0">
                                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                                    <span class="fw-bolder fs-6 text-gray-900">1,048 to
                                                        Goal</span>
                                                    <span class="fw-bold fs-6 text-gray-500">62%</span>
                                                </div>

                                                <div class="h-8px mx-3 w-100 bg-light-success rounded">
                                                    <div class="bg-success rounded h-8px" role="progressbar"
                                                        style="width: 62%;" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-xl-6 mb-xxl-10">

                                    <div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
                                        <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                                            <div class="mb-4 px-9">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">29,420</span>

                                                    <span class="badge badge-light-success fs-base">
                                                        <i class="ki-outline ki-arrow-up fs-5 text-success ms-n1"></i>
                                                        2.6% </span>

                                                </div>

                                                <span class="fs-6 fw-semibold text-gray-500">Total Online
                                                    Visitors</span>
                                            </div>

                                            <div id="kt_card_widget_9_chart" class="min-h-auto" style="height: 125px"></div>
                                        </div>
                                    </div>

                                    <div class="card card-flush h-md-50 mb-xl-10">
                                        <div class="card-header pt-5">
                                            <div class="card-title d-flex flex-column">
                                                <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2">6.3k</span>

                                                <span class="text-gray-500 pt-1 fw-semibold fs-6">Total New
                                                    Customers</span>
                                            </div>
                                        </div>

                                        <div class="card-body d-flex flex-column justify-content-end pe-0">
                                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Today’s
                                                Heroes</span>

                                            <div class="symbol-group symbol-hover flex-nowrap">
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Alan Warden">
                                                    <span
                                                        class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Michael Eberon">
                                                    <img alt="Pic"
                                                        src="/metronic8/demo39/assets/media/avatars/300-11.jpg" />
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Susan Redwood">
                                                    <span
                                                        class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Melody Macy">
                                                    <img alt="Pic" src="/metronic8/demo39/assets/media/avatars/300-2.jpg" />
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Perry Matthew">
                                                    <span
                                                        class="symbol-label bg-danger text-inverse-danger fw-bold">P</span>
                                                </div>
                                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                    title="Barry Walter">
                                                    <img alt="Pic"
                                                        src="/metronic8/demo39/assets/media/avatars/300-12.jpg" />
                                                </div>
                                                <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_view_users">
                                                    <span
                                                        class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+42</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection