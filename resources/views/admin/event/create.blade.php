@extends('layouts.admin')

@section('title', 'Create Event')

@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data"
                        class="form d-flex flex-column flex-lg-row">
                        @csrf
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>New Event</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Event Title</label>
                                        <input type="text" name="title" class="form-control mb-2" placeholder="Event title"
                                            value="{{ old('title') }}" required />
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Description</label>
                                        <textarea name="description" class="form-control mb-2" rows="5"
                                            placeholder="Event description" required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">Banner Image</label>
                                        <input type="file" name="banner_image" class="form-control" accept="image/*" />
                                        <div class="text-muted fs-7">Upload an image for the event banner (max 2MB).</div>
                                        @error('banner_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col mb-10 fv-row">
                                            <label class="required form-label">Start Time</label>
                                            <input type="datetime-local" name="start_time" class="form-control mb-2"
                                                value="{{ old('start_time') }}" required />
                                            @error('start_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col mb-10 fv-row">
                                            <label class="required form-label">End Time</label>
                                            <input type="datetime-local" name="end_time" class="form-control mb-2"
                                                value="{{ old('end_time') }}" required />
                                            @error('end_time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                                value="1" {{ old('is_active') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="is_active">
                                                Active Event (Users can see and interact if within time)
                                            </label>
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <div class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="visibility"
                                                id="visibility" value="1" {{ old('visibility') ? 'checked' : '' }} />
                                            <label class="form-check-label" for="visibility">
                                                Public Event (Visible on the app list)
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.event.index') }}" class="btn btn-light me-5">Cancel</a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Save Changes</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection