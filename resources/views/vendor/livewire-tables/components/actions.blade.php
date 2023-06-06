@props([
    'updatePermission' => NULL,
    'deletePermission' => NULL,
    'viewPermission' => NULL,
    'dropdown' => false,
    'extras' => NULL,
    'editRoute' => NULL,
    'deleteRoute' => NULL,
    'showRoute' => NULL
])


<div class="inline-flex flex-nowrap gap-2">
    @if($showRoute)
        <div class="tooltip" data-tip="View">
            <a
                href="{{ $showRoute }}"
                type="button"
                class="btn btn-square btn-sm btn-warning text-white"
            >
                <i data-feather="eye" class="h-4 w-4"></i>
            </a>
        </div>
    @endif

    @if($editRoute)
        <div class="tooltip" data-tip="Edit">
            <a
                href="{{ $editRoute }}"
                type="button"
                class="btn btn-square btn-sm btn-success text-white"
            >
                <i data-feather="edit" class="w-3 h-3"></i>
            </a>
        </div>
    @endif

    @if($deleteRoute)
        <div class="tooltip" data-tip="Delete">
            <a
                href="{{ $deleteRoute }}"
                id="delete-btn"
                data-id="{{ $row->id }}"
                type="button"
                class="btn btn-square btn-sm btn-error text-white"
            >
                <i data-feather="trash" class="w-3 h-3"></i>
            </a>
        </div>
    @endif

</div>

@push('scripts')
    <script type="module">
        $(document).ready(() => {
            let tableName = $('#{{ $column->getComponent()->getTableAttributes()['id'] }}');
            tableName.on('click', '#delete-btn', function (event) {
                event.preventDefault();
                event.stopPropagation();
                let delete_url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#34C38F",
                    cancelButtonColor: "#F46A6A",
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: delete_url,
                            type: 'POST',
                            data: {'_token': '{{ @csrf_token() }}', _method: "DELETE"},
                            success: function (result) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                ).then(() => {
                                    Livewire.emit('refreshDatatable')
                                })
                            },
                            error: function (result) {
                                console.log(result.success)
                                Swal.fire(
                                    'Error!',
                                    'Some Problem Occurred. Please Try again later.',
                                    'error'
                                ).then(() => {
                                    Livewire.emit('refreshDatatable')
                                })
                            }
                        })
                    } else {
                        Swal.fire("Cancelled", "Deletion Cancelled", "error");
                    }
                })
            });
        });
    </script>
@endpush
