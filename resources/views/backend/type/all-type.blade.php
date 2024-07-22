@extends('admin.admin-dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Property Type</li> --}}
                <a href="{{ route('add.type') }}" class="btn btn-primary btn-icon-text">
                    Add Property Type
                    <i class="btn-icon-append" data-feather="plus"></i>
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Property Type</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Type Name</th>
                                        <th>Type Icon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $types as $key => $item )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->type_name }}</td>
                                        <td>{{ $item->type_icon }}</td>
                                        <td>
                                            <a href="{{ route('edit.type', $item->id) }}" class="btn btn-warning btn-icon">
                                                <i class="btn-icon-append" data-feather="edit"></i>
                                            </a>
                                            {{-- <button type="button" class="btn btn-warning btn-icon edit-btn" data-id="{{ $item->id }}" data-type-name="{{ $item->type_name }}" data-type-icon="{{ $item->type_icon }}" data-bs-toggle="modal" data-bs-target="#typeModal">
                                                <i data-feather="edit"></i>
                                            </button> --}}
                                            <a href="{{ route('delete.type', $item->id) }}" id="delete" class="btn btn-danger btn-icon">
                                                <i class="btn-icon-append" data-feather="trash-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="typeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="typeModalLabel">Edit Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" class="forms-sample" action="{{ route('update.type') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="typeId">
                        <div class="form-group mb-3">
                            <label for="typeName" class="form-label">Type Name</label>
                            <input type="text" name="type_name" class="form-control" id="typeName">
                        </div>
                        <div class="form-group mb-3">
                            <label for="typeIcon" class="form-label">Type Icon</label>
                            <input type="text" name="type_icon" class="form-control" id="typeIcon">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- End Modal -->

    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.edit-btn').forEach(function (button) {
                button.addEventListener('click', function () {
                    const id = this.getAttribute('data-id');
                    const typeName = this.getAttribute('data-type-name');
                    const typeIcon = this.getAttribute('data-type-icon');

                    document.getElementById('typeId').value = id;
                    document.getElementById('typeName').value = typeName;
                    document.getElementById('typeIcon').value = typeIcon;
                });
            });
        });
    </script> --}}
@endsection
