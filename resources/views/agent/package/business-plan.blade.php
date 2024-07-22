@extends('agent.agent-dashboard')
@section('agent')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                {{-- <li class="breadcrumb-item"><a href="#">Special pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li> --}}
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <form action="{{ route('store.business.plan') }}" method="post">
                        @csrf

                    <div class="card-body">
                        <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 ps-0">
                                <a href="#" class="noble-ui-logo logo-light d-block mt-3">Noble<span>UI</span></a>
                                <p class="mt-1 mb-1"><b>NobleUI Themes</b></p>
                                <p>108,<br> Great Russell St,<br>London, WC1B 3NA.</p>
                                <h5 class="mt-5 mb-2 text-muted">Invoice to :</h5>
                                <p>{{ $data->name }}<br>{{ $data->email }}<br>{{ $data->address }}</p>
                            </div>
                            <div class="col-lg-3 pe-0">
                                <h4 class="fw-bolder text-uppercase text-end mt-4 mb-2">invoice</h4>
                                <h6 class="text-end mb-5 pb-4"> </h6>
                                <p class="text-end mb-1">Balance Due</p>
                                <h4 class="text-end fw-normal">$ 20</h4>
                                <h6 class="mt-3 text-end fw-normal mb-2">
                                    <span class="text-muted"> </span>

                                </h6>
                                <h6 class="text-end fw-normal"><span class="text-muted">Due Date :</span> 12th Jul 2022</h6>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package Name</th>
                                            <th class="text-end">Property Quantity</th>
                                            <th class="text-end">Unit cost</th>
                                            <th class="text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-end">
                                            <td class="text-start">1</td>
                                            <td class="text-start">Business</td>
                                            <td>3</td>
                                            <td>$20</td>
                                            <td>$20</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="container-fluid mt-5 w-100">
                            <div class="row">
                                <div class="col-md-6 ms-auto">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-end">$ 20</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-800">Total</td>
                                                    <td class="text-bold-800 text-end"> $ 20</td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Made</td>
                                                    <td class="text-danger text-end">$ 20</td>
                                                </tr>
                                                <tr class="bg-dark">
                                                    <td class="text-bold-800">Balance Due</td>
                                                    <td class="text-bold-800 text-end">$ 20</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid w-100">
                            {{-- <a href="javascript:;" class="btn btn-primary float-end mt-4 ms-2"><i data-feather="send"
                                    class="me-3 icon-md"></i>Send Invoice</a>
                            <a href="javascript:;" class="btn btn-outline-primary float-end mt-4"><i data-feather="printer"
                                    class="me-2 icon-md"></i>Print</a> --}}

                            <button type="submit" class="btn btn-primary float-end mt-4 ms-2 mb-3"><i data-feather="send" class="me-3 icon-md"></i>Send Invoice</button>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
