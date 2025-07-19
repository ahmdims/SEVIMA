@extends('layouts.app')

@section('title', 'Event')

@section('content')
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">

                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar  pt-6 pb-2 ">

                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container"
                                class="app-container  container-fluid d-flex align-items-stretch ">
                                <!--begin::Toolbar wrapper-->
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">


                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                        <!--begin::Title-->
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                            Statistics
                                        </h1>
                                        <!--end::Title-->

                                        <!--begin::Breadcrumb-->
                                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                <a href="/metronic8/demo39/index.html"
                                                    class="text-muted text-hover-primary">
                                                    Home </a>
                                            </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item">
                                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                Pages </li>
                                            <!--end::Item-->
                                            <!--begin::Item-->
                                            <li class="breadcrumb-item">
                                                <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                            </li>
                                            <!--end::Item-->

                                            <!--begin::Item-->
                                            <li class="breadcrumb-item text-muted">
                                                Widgets </li>
                                            <!--end::Item-->

                                        </ul>
                                        <!--end::Breadcrumb-->
                                    </div>
                                    <!--end::Page title-->
                                    <!--begin::Actions-->
                                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                                        <a href="#"
                                            class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                            Add Member
                                        </a>

                                        <a href="#" class="btn btn-flex btn-primary h-40px fs-7 fw-bold"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                                            New Campaign
                                        </a>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <!--end::Toolbar-->

                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content  flex-column-fluid ">


                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container  container-fluid ">
                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">


                                        <!--begin::Statistics Widget 1-->
                                        <div
                                            class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <a href="#"
                                                    class="card-title fw-bold text-muted text-hover-primary fs-4">Meeting
                                                    Schedule</a>

                                                <div class="fw-bold text-primary my-6">3:30PM - 4:20PM</div>

                                                <p class="text-gray-900-75 fw-semibold fs-5 m-0">

                                                    Create a headline that is informative<br />
                                                    and will capture readers
                                                </p>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 1-->

                                    </div>

                                    <div class="col-xl-4">


                                        <!--begin::Statistics Widget 1-->
                                        <div
                                            class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <a href="#"
                                                    class="card-title fw-bold text-muted text-hover-primary fs-4">Meeting
                                                    Schedule</a>

                                                <div class="fw-bold text-primary my-6">03 May 2020</div>

                                                <p class="text-gray-900-75 fw-semibold fs-5 m-0">

                                                    Great blog posts don’t just happen
                                                    Even the best bloggers need it
                                                </p>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 1-->

                                    </div>

                                    <div class="col-xl-4">


                                        <!--begin::Statistics Widget 1-->
                                        <div
                                            class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <a href="#"
                                                    class="card-title fw-bold text-muted text-hover-primary fs-4">UI
                                                    Conference</a>

                                                <div class="fw-bold text-primary my-6">10AM Jan, 2021</div>

                                                <p class="text-gray-900-75 fw-semibold fs-5 m-0">

                                                    AirWays - A Front-end solution for
                                                    airlines build with ReactJS
                                                </p>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 1-->

                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 2-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 fs-4 mb-2 text-hover-primary">Arthur
                                                        Goldstain</a>

                                                    <span class="fw-semibold text-muted fs-5">System & Software
                                                        Architect</span>
                                                </div>

                                                <img src="/metronic8/demo39/assets/media/svg/avatars/029-boy-11.svg"
                                                    alt="" class="align-self-end h-100px" />
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 2-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 2-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 fs-4 mb-2 text-hover-primary">Lisa
                                                        Bold</a>

                                                    <span class="fw-semibold text-muted fs-5">Marketing & Fanance
                                                        Manager</span>
                                                </div>

                                                <img src="/metronic8/demo39/assets/media/svg/avatars/014-girl-7.svg"
                                                    alt="" class="align-self-end h-100px" />
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 2-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 2-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 fs-4 mb-2 text-hover-primary">Nick
                                                        Stone</a>

                                                    <span class="fw-semibold text-muted fs-5">Customer Support
                                                        Team</span>
                                                </div>

                                                <img src="/metronic8/demo39/assets/media/svg/avatars/004-boy-1.svg"
                                                    alt="" class="align-self-end h-100px" />
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 2-->
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 3-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column p-0">
                                                <div class="d-flex flex-stack flex-grow-1 card-p">
                                                    <div class="d-flex flex-column me-2">
                                                        <a href="#"
                                                            class="text-gray-900 text-hover-primary fw-bold fs-3">Weekly
                                                            Sales</a>

                                                        <span class="text-muted fw-semibold mt-1">Your Weekly Sales
                                                            Chart</span>
                                                    </div>

                                                    <span class="symbol symbol-50px">
                                                        <span
                                                            class="symbol-label fs-5 fw-bold bg-light-success text-success">+100</span>
                                                    </span>
                                                </div>

                                                <div class="statistics-widget-3-chart card-rounded-bottom"
                                                    data-kt-chart-color="success" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 3-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 3-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column p-0">
                                                <div class="d-flex flex-stack flex-grow-1 card-p">
                                                    <div class="d-flex flex-column me-2">
                                                        <a href="#"
                                                            class="text-gray-900 text-hover-primary fw-bold fs-3">Authors
                                                            Progress</a>

                                                        <span class="text-muted fw-semibold mt-1">Marketplace Authors
                                                            Chart</span>
                                                    </div>

                                                    <span class="symbol symbol-50px">
                                                        <span
                                                            class="symbol-label fs-5 fw-bold bg-light-danger text-danger">-260</span>
                                                    </span>
                                                </div>

                                                <div class="statistics-widget-3-chart card-rounded-bottom"
                                                    data-kt-chart-color="danger" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 3-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin::Statistics Widget 3-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body d-flex flex-column p-0">
                                                <div class="d-flex flex-stack flex-grow-1 card-p">
                                                    <div class="d-flex flex-column me-2">
                                                        <a href="#"
                                                            class="text-gray-900 text-hover-primary fw-bold fs-3">Sales
                                                            Progress</a>

                                                        <span class="text-muted fw-semibold mt-1">Marketplace Sales
                                                            Chart</span>
                                                    </div>

                                                    <span class="symbol symbol-50px">
                                                        <span
                                                            class="symbol-label fs-5 fw-bold bg-light-primary text-primary">+180</span>
                                                    </span>
                                                </div>

                                                <div class="statistics-widget-3-chart card-rounded-bottom"
                                                    data-kt-chart-color="primary" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 3-->
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 4-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body p-0">
                                                <div class="d-flex flex-stack card-p flex-grow-1">
                                                    <span class="symbol  symbol-50px me-2">
                                                        <span class="symbol-label bg-light-info">
                                                            <i class="ki-outline ki-basket fs-2x text-info"></i> </span>
                                                    </span>

                                                    <div class="d-flex flex-column text-end">
                                                        <span class="text-gray-900 fw-bold fs-2">+256</span>

                                                        <span class="text-muted fw-semibold mt-1">Sales Change</span>
                                                    </div>
                                                </div>

                                                <div class="statistics-widget-4-chart card-rounded-bottom"
                                                    data-kt-chart-color="info" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 4-->
                                    </div>

                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 4-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body p-0">
                                                <div class="d-flex flex-stack card-p flex-grow-1">
                                                    <span class="symbol  symbol-50px me-2">
                                                        <span class="symbol-label bg-light-success">
                                                            <i class="ki-outline ki-bank fs-2x text-success"></i>
                                                        </span>
                                                    </span>

                                                    <div class="d-flex flex-column text-end">
                                                        <span class="text-gray-900 fw-bold fs-2">750$</span>

                                                        <span class="text-muted fw-semibold mt-1">Weekly Income</span>
                                                    </div>
                                                </div>

                                                <div class="statistics-widget-4-chart card-rounded-bottom"
                                                    data-kt-chart-color="success" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 4-->
                                    </div>

                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 4-->
                                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body p-0">
                                                <div class="d-flex flex-stack card-p flex-grow-1">
                                                    <span class="symbol  symbol-50px me-2">
                                                        <span class="symbol-label bg-light-primary">
                                                            <i class="ki-outline ki-briefcase fs-2x text-primary"></i>
                                                        </span>
                                                    </span>

                                                    <div class="d-flex flex-column text-end">
                                                        <span class="text-gray-900 fw-bold fs-2">+6.6K</span>

                                                        <span class="text-muted fw-semibold mt-1">New Users</span>
                                                    </div>
                                                </div>

                                                <div class="statistics-widget-4-chart card-rounded-bottom"
                                                    data-kt-chart-color="primary" style="height: 150px"></div>
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Statistics Widget 4-->
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-basket text-white fs-2x ms-n1"></i>

                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    Shopping Cart
                                                </div>

                                                <div class="fw-semibold text-white">
                                                    Lands, Houses, Ranchos, Farms </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-cheque text-white fs-2x ms-n1"></i>

                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    Appartments
                                                </div>

                                                <div class="fw-semibold text-white">
                                                    Flats, Shared Rooms, Duplex </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                    <div class="col-xl-4">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-chart-simple-3 text-white fs-2x ms-n1"></i>

                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    Sales Stats
                                                </div>

                                                <div class="fw-semibold text-white">
                                                    50% Increased for FY20 </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-3">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-chart-simple text-primary fs-2x ms-n1"></i>

                                                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                                    500M$
                                                </div>

                                                <div class="fw-semibold text-gray-400">
                                                    SAP UI Progress </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                    <div class="col-xl-3">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-cheque text-gray-100 fs-2x ms-n1"></i>

                                                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                                    +3000
                                                </div>

                                                <div class="fw-semibold text-gray-100">
                                                    New Customers </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                    <div class="col-xl-3">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-briefcase text-white fs-2x ms-n1"></i>

                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    $50,000
                                                </div>

                                                <div class="fw-semibold text-white">
                                                    Milestone Reached </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>

                                    <div class="col-xl-3">

                                        <!--begin::Statistics Widget 5-->
                                        <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                <i class="ki-outline ki-chart-pie-simple text-white fs-2x ms-n1"></i>

                                                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                                                    $50,000
                                                </div>

                                                <div class="fw-semibold text-white">
                                                    Milestone Reached </div>
                                            </div>
                                            <!--end::Body-->
                                        </a>
                                        <!--end::Statistics Widget 5-->
                                    </div>
                                </div>
                                <!--end::Row-->

                                <!--begin::Row-->
                                <div class="row g-5 g-xl-8">
                                    <div class="col-xl-4">
                                        <!--begin: Statistics Widget 6-->
                                        <div class="card bg-light-success card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body my-3">
                                                <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">
                                                    Project Progress </a>

                                                <div class="py-1">
                                                    <span class="text-gray-900 fs-1 fw-bold me-2">50%</span>

                                                    <span class="fw-semibold text-muted fs-7">Avarage</span>
                                                </div>

                                                <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end:: Body-->
                                        </div>
                                        <!--end: Statistics Widget 6-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin: Statistics Widget 6-->
                                        <div class="card bg-light-warning card-xl-stretch mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body my-3">
                                                <a href="#" class="card-title fw-bold text-warning fs-5 mb-3 d-block">
                                                    Company Finance </a>

                                                <div class="py-1">
                                                    <span class="text-gray-900 fs-1 fw-bold me-2">15%</span>

                                                    <span class="fw-semibold text-muted fs-7">48k Goal</span>
                                                </div>

                                                <div class="progress h-7px bg-warning bg-opacity-50 mt-7">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: 15%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end:: Body-->
                                        </div>
                                        <!--end: Statistics Widget 6-->
                                    </div>

                                    <div class="col-xl-4">
                                        <!--begin: Statistics Widget 6-->
                                        <div class="card bg-light-primary card-xl-stretch mb-5 mb-xl-8">
                                            <!--begin::Body-->
                                            <div class="card-body my-3">
                                                <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">
                                                    Marketing Analysis </a>

                                                <div class="py-1">
                                                    <span class="text-gray-900 fs-1 fw-bold me-2">76%</span>

                                                    <span class="fw-semibold text-muted fs-7">400k Impressions</span>
                                                </div>

                                                <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                        style="width: 76%" aria-valuenow="50" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <!--end:: Body-->
                                        </div>
                                        <!--end: Statistics Widget 6-->
                                    </div>
                                </div>
                                <!--end::Row-->

                            </div>
                            <!--end::Content container-->
                        </div>
                        <!--end::Content-->

                    </div>
                    <!--end::Content wrapper-->


                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer ">



                        <!--begin::Footer container-->
                        <div
                            class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2025&copy;</span>
                                <a href="https://keenthemes.com" target="_blank"
                                    class="text-gray-800 text-hover-primary">Keenthemes</a>
                            </div>
                            <!--end::Copyright-->

                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="https://keenthemes.com" target="_blank"
                                        class="menu-link px-2">About</a></li>

                                <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank"
                                        class="menu-link px-2">Support</a></li>

                                <li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank"
                                        class="menu-link px-2">Purchase</a></li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
@endsection