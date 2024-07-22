@extends('admin.admin-dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.agent') }}" class="btn btn-primary btn-icon-text">
                     Add Agent
                     <i class="btn-icon-append" data-feather="plus"></i>
                </a>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Agent All </h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Image </th>
                                        <th>Name </th>
                                        <th>Role </th>
                                        <th>Status </th>
                                        <th>Change </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allagent as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ !empty($item->photo) ? url('upload/agent-images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                                    style="width:50px; height:40px;"> </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                @if ($item->status == 'active')
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">InActive</span>
                                                @endif
                                            </td>

                                            <td>
                                                <input type="checkbox" data-id="{{ $item->id }}" class="toggle-class" data-onstyle="success" data-offstyle="danger"
                                                data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $item->status ? 'checked' : '' }}>
                                            </td>

                                            <td>
                                                <a href="{{ route('edit.agent',$item->id) }}" class="btn btn-inverse-warning btn-icon" title="edit">
                                                    <i class="btn-icon-append" data-feather="edit"></i>
                                                </a>

                                                <a href="{{ route('delete.agent',$item->id) }}" id="delete" class="btn btn-inverse-danger btn-icon" title="delete">
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


    <script>
        $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              // console.log(data.success)
                // Start Message
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
            })
            if ($.isEmptyObject(data.error)) {

                    Toast.fire({
                    type: 'success',
                    title: data.success,
                    })
            }else{

           Toast.fire({
                    type: 'error',
                    title: data.error,
                    })
                }
              // End Message
            }
        });
    })
  });
    </script>
@endsection
