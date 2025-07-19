@extends('layouts.app')

@section('title', 'Candidate')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="card" id="kt_pricing">
                <div class="card-body p-lg-17">
                    <div class="d-flex flex-column">
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold mb-5">Select Your Candidate</h1>

                            <div class="text-gray-600 fw-semibold fs-5">
                                If you need more info about our pricing, please check <a href="#"
                                    class="link-primary fw-bold">Pricing Guidelines</a>.
                            </div>
                        </div>

                        <div class="row g-10">

                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <div
                                        class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                        <div class="mb-7 text-center">
                                            <h1 class="text-gray-900 mb-5 fw-bolder">Udin</h1>

                                            <div class="text-gray-600 fw-semibold mb-5">
                                                <div class="symbol symbol-200px">
                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 mb-10">
                                            <p>
                                                Visi & Mission
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-primary">Select</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <div
                                        class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                        <div class="mb-7 text-center">
                                            <h1 class="text-gray-900 mb-5 fw-bolder">Udin</h1>

                                            <div class="text-gray-600 fw-semibold mb-5">
                                                <div class="symbol symbol-200px">
                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 mb-10">
                                            <p>
                                                Visi & Mission
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-primary">Select</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="d-flex h-100 align-items-center">
                                    <div
                                        class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                        <div class="mb-7 text-center">
                                            <h1 class="text-gray-900 mb-5 fw-bolder">Udin</h1>

                                            <div class="text-gray-600 fw-semibold mb-5">
                                                <div class="symbol symbol-200px">
                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-100 mb-10">
                                            <p>
                                                Visi & Mission
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-sm btn-primary">Select</a>
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