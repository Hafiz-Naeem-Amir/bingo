@extends('admin.layout.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Content List</h3>
            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#pageModal">
                <i class="fa fa-plus"></i> Content
            </button>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Page</th>
                        <th>H1</th>
                        <th>H2</th>
                        <th>H3</th>
                        <th>H4</th>
                        <th>H5</th>
                        <th>H6</th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>Title</th>
                        <th>Keyword</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
 <!-- Add Bootstrap Icons CSS in head -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<div class="modal fade" id="pageModal" tabindex="-1" aria-labelledby="pageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="pageModalLabel">
                    <i class="bi bi-file-earmark-plus me-2 text-warning"></i> Add New Content
                </h5>
                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <form id="contentForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="contentId" name="contentId">
                    <div class="row g-3">

                        <div class="col-md-3">
                            <label class="form-label text-primary fw-semibold">
                                <i class="bi bi-file-earmark-text text-danger"></i> Page Type
                            </label>
                            <select class="form-control border-primary" id="page_id" name="page_id">
                                <option value="">-- Select Page --</option>
                            </select>
                        </div>

                        <div class="col-md-3"><label class="text-success"><i class="bi bi-type-bold"></i> H1</label><input type="text" class="form-control border-success" id="h1" name="h1"></div>
                        <div class="col-md-3"><label class="text-info"><i class="bi bi-type"></i> H2</label><input type="text" class="form-control border-info" id="h2" name="h2"></div>
                        <div class="col-md-3"><label class="text-warning"><i class="bi bi-textarea-t"></i> H3</label><input type="text" class="form-control border-warning" id="h3" name="h3"></div>
                        <div class="col-md-3"><label class="text-danger"><i class="bi bi-text-indent-left"></i> H4</label><input type="text" class="form-control border-danger" id="h4" name="h4"></div>
                        <div class="col-md-3"><label class="text-secondary"><i class="bi bi-text-paragraph"></i> H5</label><input type="text" class="form-control border-secondary" id="h5" name="h5"></div>
                        <div class="col-md-3"><label class="text-primary"><i class="bi bi-text-left"></i> H6</label><input type="text" class="form-control border-primary" id="h6" name="h6"></div>

                        <div class="col-md-3"><label class="text-success"><i class="bi bi-align-start"></i> P1</label><input type="text" class="form-control border-success" id="p1" name="p1"></div>
                        <div class="col-md-3"><label class="text-info"><i class="bi bi-align-center"></i> P2</label><input type="text" class="form-control border-info" id="p2" name="p2"></div>

                        <div class="col-md-3"><label class="text-warning"><i class="bi bi-card-heading"></i> Title</label><input type="text" class="form-control border-warning" id="title" name="title"></div>

                        <div class="col-md-6"><label class="text-danger"><i class="bi bi-tags"></i> Keyword</label><input type="text" class="form-control border-danger" id="keyword" name="keyword"></div>
                        <div class="col-md-6"><label class="text-success"><i class="bi bi-image"></i> Image</label><input type="file" class="form-control border-success" id="image" name="image" accept="image/*"></div>

                        <div class="col-md-12">
                            <label class="text-info"><i class="bi bi-card-text"></i> Meta Description</label>
                            <textarea class="form-control border-info" id="meta_description" name="meta_description"></textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="text-primary"><i class="bi bi-journal-richtext"></i> Content</label>
                            <textarea class="form-control border-primary" id="content" name="content"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle"></i> Close
                        </button>
                        <button type="button" id="saveContent" class="btn btn-success">
                            <i class="bi bi-save"></i> Save Content
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



    <script>
$(document).ready(function() {
    var table = $('#dataTable').DataTable({
        processing: false,
        serverSide: true,
        responsive: true,
        ajax: "{{ url('admin/contents-data') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'page_name', name: 'page_name' },
            { data: 'h1', name: 'h1' },
            { data: 'h2', name: 'h2', visible: false },
            { data: 'h3', name: 'h3', visible: false },
            { data: 'h4', name: 'h4', visible: false },
            { data: 'h5', name: 'h5', visible: false },
            { data: 'h6', name: 'h6', visible: false },
            { data: 'p1', name: 'p1' },
            { data: 'p2', name: 'p2', visible: false },
            { data: 'title', name: 'title' },
            { data: 'design', name: 'design', visible: false },
            { data: 'keyword', name: 'keyword', visible: false },
            { data: 'content', name: 'content', visible: false },
            { data: 'image', name: 'image', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    //store//
    


});
</script>

@endsection
