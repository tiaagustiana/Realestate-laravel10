@extends('admin.admin-dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.property') }}" class="btn btn-primary btn-icon-text">
                Add Property
                <i class="btn-icon-append" data-feather="plus"></i>
            </a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Property All </h6>

                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Sl </th>
                                    <th>Image </th>
                                    <th>Name </th>
                                    <th>P. Type </th>
                                    <th>Status Type </th>
                                    <th>City </th>
                                    <th>Code </th>
                                    <th>Status </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($property as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img src="{{ asset($item->property_thumbnail) }}"
                                            style="width:70px; height:40px;"> </td>
                                    <td>{{ $item->property_name }}</td>
                                    <td>{{ $item['type']['type_name'] }}</td>
                                    <td>{{ $item->property_status }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{{ $item->property_code }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">InActive</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('details.property',$item->id) }}" class="btn btn-inverse-info btn-icon" title="details">
                                            <i class="btn-icon-append" data-feather="eye"></i>
                                        </a>
                                        <a href="{{ route('edit.property',$item->id) }}" class="btn btn-inverse-warning btn-icon" title="edit">
                                            <i class="btn-icon-append" data-feather="edit"></i>
                                        </a>
                                        <a href="{{ route('delete.property',$item->id) }}" class="btn btn-inverse-danger btn-icon" id="delete">
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

@endsection
