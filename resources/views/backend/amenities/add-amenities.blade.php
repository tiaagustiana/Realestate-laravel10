@extends('admin.admin-dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Amenitie</a></li>
                <li class="breadcrumb-item"><a href="#">All Amenities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Amenities</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Amenities</h6>

                        <form id="myForm" class="forms-sample" action="{{ route('store.amenitie') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="amenitiesName" class="form-label">Amenities Name</label>
                                <input type="text" name="amenities_name" class="form-control">
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
                    amenities_name: {
                        required : true,
                    },

                },
                messages :{
                    amenities_name: {
                        required : 'Please Enter Amenities Name',
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
