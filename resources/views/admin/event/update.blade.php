<div class="modal fade" id="modal_edit-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">

            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>

            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <form class="form" action="{{ route('admin.event.update', $event->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Edit @yield('title')</h1>
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-semibold mb-2">Title</label>
                        <input class="form-control form-control-solid" name="title" value="{{ $event->title }}"
                            required />
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-semibold mb-2">Start Time</label>
                        <input class="form-control form-control-solid" name="title" value="{{ $event->title }}"
                            required />
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-semibold mb-2">End Time</label>
                        <input class="form-control form-control-solid" name="title" value="{{ $event->title }}"
                            required />
                    </div>

                    <div class="d-flex flex-column mb-5 fv-row">
                        <label class="required fs-5 fw-semibold mb-2">Status</label>
                        <input class="form-control form-control-solid" name="title" value="{{ $event->title }}"
                            required />
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>