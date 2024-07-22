@extends('admin.admin-dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Property Type</a></li>
                <li class="breadcrumb-item"><a href="#">All Type</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Type</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Property Type</h6>

                        <form class="forms-sample" action="{{ route('store.type') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="typeName" class="form-label">Type Name</label>
                                <input type="text" name="type_name" class="form-control @error('type_name') is-invalid @enderror">
                                    @error('type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="typeIcon" class="form-label">Type Icon</label>
                                <input type="text" name="type_icon" class="form-control @error('type_icon') is-invalid @enderror">
                                    @error('type_icon')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
