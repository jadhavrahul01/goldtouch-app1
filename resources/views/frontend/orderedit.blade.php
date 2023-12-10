@extends('frontend.includes.app')
@section('title', 'Make Order')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="flex-wrap mb-sm-4 d-flex align-items-center text-head">
                <h2 class="mb-3 me-auto">Order</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="javascript: void();">Order</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row position-relative">
                <div class="col-md-4 warningBox2">
                    @include('frontend.message')
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="/order-update/{{ $order->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER NAME</label>
                                            <input type="text" class="form-control" name="cname"
                                                value="{{ $order->cname }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER ADD</label>
                                            <input type="text" class="form-control" name="cadd"
                                                value="{{ $order->cadd }}" readonly>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER GSTIN</label>
                                            <input type="text" class="form-control" name="cgstin"
                                                value="{{ $order->cgstin }}" readonly>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">STYLE REF</label>
                                            <input type="text" class="form-control" name="styleref"
                                                value="{{ $order->cstyle_ref }}"
                                                {{ Auth::user()->role == 2 ? '' : 'disabled' }}>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO NUMBER</label>
                                            <input type="text" class="form-control" name="pono"
                                                value="{{ $order->ponumber }}" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO COPY UPLOAD</label><br>
                                            <div class="col-md-12 d-flex justify-content-center align-items-center">
                                                @if ($order->poimg)
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control"
                                                            value="{{ $order->poimg }}" name="oldpoimg" disabled>
                                                    </div>
                                                @endif
                                                <div class="col-md-{{ $order->poimg ? '6' : '12' }}">
                                                    <input type="file" class="form-control" name="poimg"
                                                        id="poimg">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 1</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker1" class="form-control"
                                                        style="width: 100%" placeholder="Enter measurement taker name"
                                                        value="{{ $order->mtaker1 }}" required />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mtakerDate1"
                                                        value="{{ $order->mtakerDate1 }}" class="form-control"
                                                        style="width: 100%" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 2</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtaker2 }}"
                                                        placeholder="Enter measurement taker name (optional)" />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mdatetime2" class="form-control"
                                                        style="width: 100%" value="{{ $order->mtakerDate2 }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="email" class="mt-1 form-control"
                                                        placeholder="Enter Email Id 1" name="email1"
                                                        value="{{ $order->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Phone</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Phone Number 1" name="phone1"
                                                        value="{{ $order->phone }}" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center">Employee Details</h3>
                </div>
                <div class="col-md-12 statusBox">
                    <div id="sStatus" class="status">

                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="flex-wrap d-flex">
                        <div class="mb-3 table-search pe-3">
                            <form action="" method="get">
                                <div class="input-group search-area">
                                    <input type="text" name="s" class="form-control"
                                        placeholder="Search customer name here" value="{{ Request::get('s') }}" required>

                                    <button type="submit" class="btn btn-sm input-group-text">
                                        <i class="flaticon-381-search-2"></i>
                                    </button>

                                </div>
                            </form>
                        </div>

                        <a onclick="history.back()" class="mb-3 btn btn-warning">
                            <i class="fas fa-redo-alt"></i>
                        </a>

                        {{-- <div class="excelbtn">
                            <form action="/import/update-employee" method="post">
                                @csrf
                                @method('put')

                                <button type="button" class="btn btn-primary me-4 exceluploadbtn">
                                    <i class="bi bi-file-earmark-excel-fill"></i>
                                </button>

                                <button type="submit" class="btn btn-primary me-4 d-none addButton">
                                    <i class="fa fa-upload"></i>
                                </button>

                                @error('employee_file')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror

                                <input type="file" name="employee_file" class="form-control d-none import_file">
                            </form>
                        </div> --}}

                        <div class="excelerror">
                            <span class="text-danger me-3" id="result"></span>
                        </div>

                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table mb-4 display dataTablesCard order-table shadow-hover card-table"
                            id="example5">
                            <thead>
                                <tr class="text-center">
                                    <th>Token No</th>
                                    <th>Employee Name</th>
                                    <th>Sname</th>
                                    <th>category</th>
                                    <th>Set Order</th>
                                    <th>Order Status</th>
                                    <th class="">Edits</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @foreach ($employees as $od)
                                    @if ($od->customer_id == $order->u_id)
                                        <tr>
                                            <td class="text-ov">{{ $od->tokenNo }}</td>
                                            <td>{{ $od->fullName }}</td>
                                            <td>{{ $od->sname }}</td>
                                            <td>{{ $od->category }}</td>
                                            <td>{{ $od->setOrder }}</td>
                                            <td>
                                                @if ($od->status == 'MP')
                                                    <span class="text-warning">Measurement Pending</span>
                                                @elseif ($od->status == 'MD')
                                                    <span class="text-success">Measurement Done</span>
                                                @elseif ($od->status == 'RD')
                                                    <span class="text-success">Ready for dispatch</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="dropdown ms-auto c-pointer">
                                                    <div class="btn-link" data-bs-toggle="dropdown">
                                                        <svg width="24" height="24" viewbox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.0005 12C11.0005 12.5523 11.4482 13 12.0005 13C12.5528 13 13.0005 12.5523 13.0005 12C13.0005 11.4477 12.5528 11 12.0005 11C11.4482 11 11.0005 11.4477 11.0005 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                            <path
                                                                d="M18.0005 12C18.0005 12.5523 18.4482 13 19.0005 13C19.5528 13 20.0005 12.5523 20.0005 12C20.0005 11.4477 19.5528 11 19.0005 11C18.4482 11 18.0005 11.4477 18.0005 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                            <path
                                                                d="M4.00049 12C4.00049 12.5523 4.4482 13 5.00049 13C5.55277 13 6.00049 12.5523 6.00049 12C6.00049 11.4477 5.55277 11 5.00049 11C4.4482 11 4.00049 11.4477 4.00049 12Z"
                                                                stroke="#3E4954" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </div>

                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if ($order->fabrics_status == 2)
                                                            <form
                                                                action="/m-done/{{ $od->id }}/{{ $order->id }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="text-black dropdown-item">
                                                                    Measurement Done
                                                                </button>
                                                            </form>
                                                            <form action="/m-pending/{{ $od->id }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="text-black dropdown-item">
                                                                    Measurement Pending
                                                                </button>
                                                            </form>
                                                            <form action="/ready-dispatch/{{ $od->id }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="text-black dropdown-item">
                                                                    Ready for dispatch
                                                                </button>
                                                            </form>
                                                        @elseif ($od->fabrics_status == 0)
                                                            <span class="text-center">
                                                                Waiting for fabric availability
                                                            </span>
                                                        @elseif ($od->fabrics_status == 1)
                                                            <span class="text-center">
                                                                Fabric is not available for this order
                                                            </span>
                                                        @elseif ($od->fabrics_status == 3)
                                                            <span class="text-center">Order is on hold</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        $('#poimage').click(function(e) {
            e.preventDefault();
            $('#poimg').click();
        });

        $('.exceluploadbtn').click(function() {
            $('.import_file').click();
        });

        $(document).ready(function() {
            const fileInput = $(".import_file");
            const resultDiv = $("#result");

            fileInput.on("change", function() {
                const selectedFile = fileInput[0].files[0];

                if (selectedFile) {
                    const allowedExtensions = [
                        "xlsx", "xlx", "xls", "csv"
                    ]; // Define your allowed extensions here.
                    const fileExtension = selectedFile.name.split(".").pop().toLowerCase();

                    if (allowedExtensions.includes(fileExtension)) {
                        $('.exceluploadbtn').addClass('d-none');
                        $('.addButton').removeClass('d-none');
                    } else {
                        resultDiv.text("Only excel file is allowed.");
                    }
                } else {
                    resultDiv.text("No file selected.");
                }
            });
        });
    </script>

@endsection


{{--
@section('customJs')
    <script>
        $(document).ready(function() {
            $(document).on('click', '#assign', function(e) {
                e.preventDefault();
                var id = $('#orderId').val();

                var data = {
                    'userId': $('#userID').val(),
                    'userName': $('#userName').val(),
                };

                $('#assign').prop("disabled", true).val('wait...');


                $.ajax({
                    type: "post",
                    url: "/assign/" + id,
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 400) {
                            $('#errstatus').html("");
                            $('#errstatus').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errstatus').append('<li>' + err_values +
                                    '</li>').delay(300).fadeOut(2000);
                            });
                        } else if (response.status == 404) {
                            $('#errstatus').html("");
                            $('#sStatus').addClass('alert alert-danger');
                            $('#sStatus').text(response.message);
                        } else {
                            $('#errstatus').html("");
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-success');
                            $('#sStatus').text(response.message).delay(300).fadeOut(2000);
                            $('#assign').prop("disabled", true).val('assigned');
                        }
                    }
                });
            });
        });
    </script>
@endsection --}}
