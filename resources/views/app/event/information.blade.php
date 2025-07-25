@extends('layouts.app')

@section('title', $event->title . ' Information')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="card" id="kt_event_information">
                <div class="card-body p-lg-17">
                    <div class="d-flex flex-column text-center">

                        <div class="mb-13">
                            <h1 class="fs-2hx fw-bold mb-5 text-gray-900">{{ $event->title }}</h1>
                            <div class="text-gray-600 fw-semibold fs-5">
                                <span class="badge badge-light-primary fs-7 fw-bold me-2">Mulai:
                                    {{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }}</span>
                                <span class="badge badge-light-danger fs-7 fw-bold">Berakhir:
                                    {{ \Carbon\Carbon::parse($event->end_time)->format('M d, Y H:i') }}</span>
                            </div>
                        </div>

                        <div class="mb-10 text-center">
                            @if($event->banner_image)
                                <img src="{{ asset('storage/' . $event->banner_image) }}" alt="Event Banner"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-width: 800px; height: auto; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/media/misc/infography.svg') }}" alt="Default Event Banner"
                                    class="img-fluid rounded shadow-sm"
                                    style="max-width: 800px; height: auto; object-fit: cover;">
                            @endif
                        </div>

                        <div class="mb-10 text-start">
                            <h2 class="fs-3hx fw-bold mb-5 text-gray-800">Deskripsi</h2>
                            <p class="text-gray-700 fs-5">
                                {{ $event->description }}
                            </p>
                        </div>

                        <div class="mb-10">
                            <h2 class="fs-3hx fw-bold mb-5 text-gray-800">Kandidat</h2>
                            @if ($candidates->count() > 0)
                                <div class="row g-5 g-xl-8">
                                    @foreach ($candidates as $candidate)
                                        <div class="col-xl-4">
                                            <div class="card card-xl-stretch mb-xl-8">
                                                <div class="card-body d-flex flex-column flex-center text-center">
                                                    <div class="symbol symbol-100px symbol-circle mb-5">
                                                        <img src="{{ asset('assets/media/avatars/blank.png') }}"
                                                            alt="Candidate Photo" />
                                                    </div>
                                                    <a href="#"
                                                        class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $candidate->name }}</a>
                                                    <div class="mb-9">
                                                        <div class="fw-semibold text-gray-600">
                                                            {{ Str::limit($candidate->description, 100) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">Belum ada kandidat tersedia untuk event ini.</p>
                            @endif
                        </div>

                        <div class="mb-10">
                            <h2 class="fs-3hx fw-bold mb-5 text-gray-800">Distribusi Suara Saat Ini (Contoh Placeholder
                                Chart)</h2>
                            <div class="chart-placeholder bg-light bg-opacity-75 p-5 rounded"
                                style="height: 300px; display: flex; justify-content: center; align-items: center; border: 1px dashed #ccc;">
                                <p class="text-muted fs-6">Integrasi Chart Akan Ditempatkan Di Sini (misalnya, menggunakan
                                    Chart.js dengan data suara kandidat)</p>
                            </div>
                        </div>

                        <div class="mt-10">
                            @if ($canVote)
                                <a href="{{ route('app.voting.index', $event->id) }}"
                                    class="btn btn-lg btn-primary fw-bolder">Lanjutkan ke Voting</a>
                            @else
                                <button class="btn btn-lg btn-secondary fw-bolder" disabled>Voting Belum Dibuka atau Sudah
                                    Berakhir</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection