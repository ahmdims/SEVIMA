@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="card" id="kt_pricing">
                <div class="card-body p-lg-17">
                    <div class="d-flex flex-column">
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold mb-5">Select Event</h1>

                            <div class="text-gray-600 fw-semibold fs-5">
                                Find the vote you want to make
                            </div>
                        </div>

                        <div class="row g-5 g-xl-8">
                            @foreach ($events as $key => $event)
                                <div class="col-xl-4">
                                    <div
                                        class="card bgi-no-repeat bgi-position-y-top bgi-position-x-end statistics-widget-1 card-xl-stretch mb-xl-8">
                                        <div class="card-body">
                                            {{-- Link to the new information page --}}
                                            <a href="{{ route('app.event.information', $event->id) }}"
                                                class="card-title fw-bold text-muted text-hover-primary fs-4">
                                                {{ $event->title }}
                                            </a>

                                            <div class="fw-bold text-primary my-6">
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }} -
                                                {{ \Carbon\Carbon::parse($event->end_time)->format('M d, Y H:i') }}
                                            </div>

                                            <p class="text-gray-900-75 fw-semibold fs-5 m-0">
                                                {{ \Illuminate\Support\Str::limit($event->description, 100) }} {{-- Display a
                                                snippet of description --}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection