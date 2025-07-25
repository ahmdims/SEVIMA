@extends('layouts.app')

@section('title', 'Voting for ' . $event->title)

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="card" id="kt_pricing">
                <div class="card-body p-lg-17">
                    <div class="d-flex flex-column">
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold mb-5">Pilih Kandidat Anda untuk {{ $event->title }}</h1>

                            <div class="text-gray-600 fw-semibold fs-5">
                                Satu suara Anda sangat berarti
                            </div>
                        </div>

                        <div class="row g-10">

                            @foreach ($candidates as $index => $candidate)
                                <div class="col-xl-4">
                                    <div class="d-flex h-100 align-items-center">
                                        <div
                                            class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                            <div class="mb-7 text-center">
                                                <h1 class="text-gray-900 mb-5 fw-bolder">
                                                    {{ $candidate->name }}
                                                </h1>

                                                <div class="text-gray-600 fw-semibold mb-5">
                                                    <div class="symbol symbol-200px">
                                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="" /> {{--
                                                        Placeholder for candidate image --}}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="w-100 mb-10">
                                                <p>
                                                    {{ $candidate->description }}
                                                </p>
                                            </div>
                                            {{-- Form for voting --}}
                                            <form action="{{ route('app.vote.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    {{ $hasVoted ? 'disabled' : '' }}>
                                                    {{ $hasVoted ? 'Sudah pernah melakukan vote' : 'Pilih' }}
                                                </button>
                                            </form>
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