<div class="modal fade" id="modal_delete-{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered mw-450px">
        <div class="modal-content rounded">

            <div class="modal-body scroll-y pt-10 pb-10">

                <div class="swal2-icon swal2-warning swal2-icon-show mb-10" style="display: flex;">
                    <div class="swal2-icon-content">!</div>
                </div>

                <p class="fs-5 text-center mb-10">
                    Are you sure you want to delete {{ $event->name }}?
                </p>

                <div class="text-center">
                    <form class="form" action="{{ route('admin.event.destroy', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger me-3">
                            <span class="indicator-label">Yes, delete!</span>
                        </button>

                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            No, cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
