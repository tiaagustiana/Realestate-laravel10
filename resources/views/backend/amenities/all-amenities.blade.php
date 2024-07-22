@extends('admin.admin-dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">All Property Type</li> --}}
                <a href="{{ route('add.amenitie') }}" class="btn btn-primary btn-icon-text">
                    Add Amenities
                    <i class="btn-icon-append" data-feather="plus"></i>
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">All Amenities</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Amenities Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $amenities as $key => $item )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->amenities_name }}</td>
                                        <td>
                                            <a href="{{ route('edit.amenitie', $item->id) }}" class="btn btn-warning btn-icon">
                                                <i class="btn-icon-append" data-feather="edit"></i>
                                            </a>
                                            {{-- <button type="button" class="btn btn-warning btn-icon edit-btn" data-id="{{ $item->id }}" data-amenities-name="{{ $item->amenities_name }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i data-feather="edit"></i>
                                            </button> --}}
                                            <a href="{{ route('delete.amenitie', $item->id) }}" id="delete" class="btn btn-danger btn-icon">
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

    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Amenities</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" class="forms-sample" action="{{ route('update.amenitie') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="amenitiesId">
                        <div class="form-group mb-3">
                            <label for="amenitiesName" class="form-label">Amenities Name</label>
                            <input type="text" name="amenities_name" class="form-control" id="amenitiesName">
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
                    const amenitiesName = this.getAttribute('data-amenities-name');

                    document.getElementById('amenitiesId').value = id;
                    document.getElementById('amenitiesName').value = amenitiesName;
                });
            });
        });
    </script> --}}
@endsection
