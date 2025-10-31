@extends('admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Page List</h3>
            <button type="button" class="btn btn-primary float-end" id="addPageBtn">
                <i class="fa fa-plus"></i>
                Add Page
            </button>
        </div>
       <div class="card-body bg-light">
        <table id="dataTable" class="table table-bordered table-hover align-middle shadow-sm">
            <thead class="table-primary text-center">
                <tr>
                    <th><i class="bi bi-hash"></i> ID</th>
                    <th><i class="bi bi-folder-fill"></i> Page Type Name</th>
                    <th><i class="bi bi-file-text"></i> Page Name</th>
                    <th><i class="bi bi-link-45deg"></i> Page Slug</th>
                    <th><i class="bi bi-gear-fill"></i> Action</th>
                </tr>
            </thead>
            <tbody class="text-center"></tbody>
        </table>
    </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="pageModalLabel">
                    <i class="bi bi-file-earmark-plus-fill text-warning me-2"></i> Add / Edit Page
                </h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body bg-light">
                <form id="pageForm">
                    @csrf
                    <input type="hidden" id="pageId" name="pageId">

                    <div class="mb-3">
                        <label class="form-label text-primary fw-semibold">
                            <i class="bi bi-folder-fill text-success"></i> Page Type Name
                        </label>
                        <input type="text" class="form-control border-primary" id="p_type_name" name="p_type_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-info fw-semibold">
                            <i class="bi bi-file-text-fill text-danger"></i> Page Name
                        </label>
                        <input type="text" class="form-control border-info" id="p_name" name="p_name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-success fw-semibold">
                            <i class="bi bi-link-45deg text-warning"></i> Page Slug
                        </label>
                        <input type="text" class="form-control border-success" id="p_slug" name="p_slug" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Close
                        </button>
                        <button type="submit" id="savePage" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Add Page
                        </button>
                        <button type="submit" id="updatePage" class="btn btn-success" style="display:none;">
                            <i class="bi bi-arrow-repeat"></i> Update Page
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(function() {

            $(function() {
                var table = $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('admin/pages-data') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'p_type_name',
                            name: 'p_type_name'
                        },
                        {
                            data: 'p_name',
                            name: 'p_name'
                        },
                        {
                            data: 'p_slug',
                            name: 'p_slug'
                        },
                        {
                            data: 'id',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            render: function(data) {
                                return `
                        <button class="btn btn-sm btn-primary editBtn" data-id="${data}"> <i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger deleteBtn" data-id="${data}"> <i class="fas fa-trash"></i></button>
                    `;
                            }
                        }
                    ]
                });
            });
            // Add Page Button Click
            $('#addPageBtn').click(function() {
                $('#pageModal').modal('show');
                $('#pageForm')[0].reset();
                $('#savePage').show();
                $('#updatePage').hide();
                $('#savePage').removeData('id');
            });

            // AJAX store
            $('#pageForm').submit(function(e) {
                e.preventDefault();

                let formData = $(this).serialize();
                let pageId = $('#pageId').val(); // hidden input se ID lein
                let ajaxUrl = '';
                let ajaxType = '';

                if (pageId === '') {
                    // 👉 Create
                    ajaxUrl = "{{ route('admin.pages.store') }}";
                    ajaxType = 'POST';
                } else {
                    // 👉 Update
                    ajaxUrl = '/pages/' + pageId;
                    ajaxType = 'PUT';
                }

                $.ajax({
                    url: ajaxUrl,
                    type: ajaxType,
                    data: formData,
                    success: function(response) {
                        if (response.success || response.status) {
                            $('#pageModal').modal('hide');
                            $('#dataTable').DataTable().ajax.reload();

                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.success ?? 'Operation successful!',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // Validation Error
                            let errors = xhr.responseJSON.errors;
                            let errorMsg = '';
                            $.each(errors, function(key, value) {
                                errorMsg += value[0] + "\n";
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                text: errorMsg,
                                confirmButtonText: 'OK'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Something went wrong!',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            });

            // Use delegated event if buttons are dynamic
            $(document).on('click', '.editBtn', function() {
                let editdata = $(this).data('id'); // get the page ID
                $.ajax({
                    url: '/pages/' + editdata + '/edit', // send only the ID in URL
                    type: 'GET',
                    success: function(response) {
                        // Open modal
                        $('#pageModal').modal('show');
                        $('#savePage').hide();
                        $('#updatePage').show();

                        // Populate form fields with response data
                        $('#pageId').val(response.id);
                        $('#p_type_name').val(response.p_type_name);
                        $('#p_name').val(response.p_name);
                        $('#p_slug').val(response.p_slug);

                        // SweetAlert notification
                        Swal.fire({
                            icon: 'info',
                            title: 'Edit Page',
                            text: 'Page data loaded into form',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    },
                    error: function(xhr) {
                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (e) {
                            res = {
                                error: 'Something went wrong!'
                            };
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: res.error,
                            showConfirmButton: true
                        });
                    }
                });
            });

            $(document).on('click', '.deleteBtn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to delete this page?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/pages/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                $('#dataTable').DataTable().ajax.reload();
                                Swal.fire('Deleted!', response.success, 'success');
                            },
                            error: function() {
                                Swal.fire('Error!', 'Something went wrong!', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
