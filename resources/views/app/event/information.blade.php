@extends('layouts.app')

@section('title', $event->title . ' Information')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="card" id="kt_event_information">
                <div class="card-body p-lg-17">
                    <div class="d-flex flex-column text-center">
                        <div class="mb-13">
                            <h1 class="fs-2hx fw-bold mb-5">{{ $event->title }}</h1>
                            <div class="text-gray-600 fw-semibold fs-5">
                                {{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }} -
                                {{ \Carbon\Carbon::parse($event->end_time)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <div class="mb-10">
                            @if($event->banner_image)
                                <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Event Banner"
                                    class="img-fluid rounded" style="max-width: 800px; height: auto;">
                            @else
                                <img src="{{ asset('assets/media/misc/infography.svg') }}" alt="Default Event Banner"
                                    class="img-fluid rounded" style="max-width: 800px; height: auto;"> {{-- Placeholder image
                                --}}
                            @endif
                        </div>

                        <div class="mb-10 text-start">
                            <h2 class="fs-3hx fw-bold mb-5">Description</h2>
                            <p class="text-gray-900-75 fs-5">
                                {{ $event->description }}
                            </p>
                        </div>

                        {{-- Placeholder for chart. You would integrate a charting library here (e.g., Chart.js) --}}
                        <div class="mb-10">
                            <h2 class="fs-3hx fw-bold mb-5">Current Vote Distribution (Example Chart Placeholder)</h2>
                            <div class="chart-placeholder"
                                style="height: 300px; background-color: #f0f0f0; display: flex; justify-content: center; align-items: center; border-radius: 8px;">
                                <p class="text-muted">Chart Integration Goes Here (e.g., using Chart.js with candidate vote
                                    data)</p>
                            </div>
                        </div>

                        <div class="mt-10">
                            @if ($canVote)
                                <a href="{{ route('app.voting.index', $event->id) }}" class="btn btn-lg btn-primary">Proceed to
                                    Voting</a>
                            @else
                                <button class="btn btn-lg btn-secondary" disabled>Voting is Not Open Yet or Has Ended</button>
                                @if(session('error'))
                                    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection