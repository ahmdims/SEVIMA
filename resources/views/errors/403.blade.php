@extends('layouts.error')

@section('title', '404')

@section('content')
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('{{ asset('assets/media/auth/bg7.jpg') }}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('assets/media/auth/bg7-dark.jpg') }}');
            }
        </style>

        <div class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">
                <div class="card card-flush w-lg-650px py-5">
                    <div class="card-body py-15 py-lg-20">

                        <h1 class="fw-bolder fs-2qx text-gray-900 mb-4">
                            404 Forbidden
                        </h1>

                        <div class="fw-semibold fs-6 text-gray-500 mb-7">
                            You don't have permission to access this page.
                        </div>

                        <div class="mb-11">
                            <img src="{{ asset('assets/media/auth/404-error.png') }}"
                                class="mw-100 mh-300px theme-light-show" alt="" />
                            <img src="{{ asset('assets/media/auth/404-error-dark.png') }}"
                                class="mw-100 mh-300px theme-dark-show" alt="" />
                        </div>

                        <div class="mb-0">
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Go Back</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
