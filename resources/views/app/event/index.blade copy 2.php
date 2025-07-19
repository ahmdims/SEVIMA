@extends('layouts.app')

@section('title', 'Event')

@section('content')
    <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

                <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">

                        <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                            <h1
                                class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                Statistics
                            </h1>

                            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                <li class="breadcrumb-item text-muted">
                                    <a href="/metronic8/demo39/index.html" class="text-muted text-hover-primary">
                                        Home </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>

                                <li class="breadcrumb-item text-muted">
                                    Pages </li>

                                <li class="breadcrumb-item">
                                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                </li>

                                <li class="breadcrumb-item text-muted">
                                    Widgets </li>

                            </ul>
                        </div>

                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <a href="#"
                                class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                Add Member
                            </a>

                            <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_create_campaign">
                                New Campaign
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kt_app_content" class="app-content  flex-column-fluid ">
                <div id="kt_app_content_container" class="app-container  container-fluid ">
                    <div class="row g-5 g-xl-8">
                        <div class="col-xl-4">

                            <div
                                class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8">
                                <div class="card-body">
                                    <a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">Meeting
                                        Schedule</a>

                                    <div class="fw-bold text-primary my-6">3:30PM - 4:20PM</div>

                                    <p class="text-gray-900-75 fw-semibold fs-5 m-0">

                                        Create a headline that is informative<br />
                                        and will capture readers
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection