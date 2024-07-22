@extends('admin.admin-dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Role & Permission</a></li>
                <li class="breadcrumb-item"><a href="#">All Permission</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Permission</h6>

                        <form id="myForm" class="forms-sample" action="{{ route('store.permission') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="groupName" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="groupName">
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
                        required : 'Please Enter Amenities Name',
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
