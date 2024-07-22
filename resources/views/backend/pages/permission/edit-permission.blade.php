@extends('admin.admin-dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Role & Permissions</a></li>
                <li class="breadcrumb-item"><a href="#">All Permissions</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Permissions</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Edit Permission</h6>

                        <form id="myForm" class="forms-sample" action="{{ route('update.permission') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $permissions->id }}">

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $permissions->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="groupName" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="groupName">
                                    <option value="Type" {{ $permissions->group_name == 'Type'
                                        ? 'selected' : '' }} >Property Type</option>
                                    <option value="State" {{ $permissions->group_name == 'State'
                                        ? 'selected' : '' }} >Property State</option>
                                    <option value="Amenities" {{ $permissions->group_name == 'Amenities'
                                        ? 'selected' : '' }} >Amenities</option>
                                    <option value="Property" {{ $permissions->group_name == 'Property'
                                        ? 'selected' : '' }} >Property</option>
                                    <option value="History" {{ $permissions->group_name == 'History'
                                        ? 'selected' : '' }} >Package History</option>
                                    <option value="Message" {{ $permissions->group_name == 'Message'
                                        ? 'selected' : '' }} >Property Message</option>
                                    <option value="Testimonials" {{ $permissions->group_name == 'Testimonials'
                                        ? 'selected' : '' }} >Testimonials Manage</option>
                                    <option value="Agent" {{ $permissions->group_name == 'Agent'
                                        ? 'selected' : '' }} >Manage Agent</option>
                                    <option value="Category" {{ $permissions->group_name == 'Category'
                                        ? 'selected' : '' }} >Blog Category</option>
                                    <option value="Post" {{ $permissions->group_name == 'Post'
                                        ? 'selected' : '' }} >Blog Post</option>
                                    <option value="Comment" {{ $permissions->group_name == 'Comment'
                                        ? 'selected' : '' }} >Blog Comment</option>
                                    <option value="Smtp" {{ $permissions->group_name == 'Smtp'
                                        ? 'selected' : '' }} >SMTP Setting</option>
                                    <option value="Site" {{ $permissions->group_name == 'Site'
                                        ? 'selected' : '' }} >Site Setting</option>
                                    <option value="Role" {{ $permissions->group_name == 'Role'
                                        ? 'selected' : '' }} >Role & Permission</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    group_name: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter Permission Name',
                    },
                    group_name: {
                        required : 'Please Choose Group Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

@endsection
