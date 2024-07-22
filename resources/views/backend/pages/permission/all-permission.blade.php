@extends('admin.admin-dashboard')
@section('admin')
<div class="page-content">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.permission') }}" class="btn btn-primary btn-icon-text">
                Add Permission
                <i class="btn-icon-append" data-feather="plus"></i>
            </a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">All Permissions</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Permission Name</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->group_name }}</td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-warning btn-icon edit-btn" data-id="{{ $item->id }}" data-name="{{ $item->name }}" data-group_name="{{ $item->group_name }}" data-bs-toggle="modal" data-bs-target="#permissionModal">
                                            <i data-feather="edit"></i>
                                        </button> --}}
                                        <a href="{{ route('edit.permission', $item->id) }}" id="edit" class="btn btn-warning btn-icon">
                                            <i class="btn-icon-append" data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('delete.permission', $item->id) }}" id="delete" class="btn btn-danger btn-icon">
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
    {{-- <div class="modal fade" id="permissionModal" tabindex="-1" aria-labelledby="permissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="permissionModalLabel">Edit Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" class="forms-sample" action="{{ route('update.permission') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="permissionId">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Permission Name</label>
                            <input type="text" name="name" class="form-control" id="permissionName">
                        </div>
                        <div class="form-group mb-3">
                            <label for="groupName" class="form-label">Group Name</label>
                            <select name="group_name" class="form-select" id="permissionGroupName">
                                <option selected="" disabled="">-- Select Group --</option>
                                <option value="Type">Property Type</option>
                                <option value="State">Property State</option>
                                <option value="Amenities">Amenities</option>
                                <option value="Property">Property</option>
                                <option value="History">Package History</option>
                                <option value="Message">Property Message</option>
                                <option value="Testimonials">Testimonials Manage</option>
                                <option value="Agent">Manage Agent</option>
                                <option value="Category">Blog Category</option>
                                <option value="Post">Blog Post</option>
                                <option value="Comment">Blog Comment</option>
                                <option value="Smtp">SMTP Setting</option>
                                <option value="Site">Site Setting</option>
                                <option value="Role">Role & Permission</option>
                            </select>
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
                const name = this.getAttribute('data-name');
                const groupName = this.getAttribute('data-group_name');

                document.getElementById('permissionId').value = id;
                document.getElementById('permissionName').value = name;
                document.getElementById('permissionGroupName').value = groupName;
            });
        });
    });
</script> --}}
@endsection
