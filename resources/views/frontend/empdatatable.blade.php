<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Gold Touch | Employee Entry</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="{{ asset('user-assets/xhtml/image/png') }}" href="images/favicon.png">

    <link href="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('user-assets/xhtml/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">

                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <center class="position-relative">
                                    <h3>Gold Touch</h3>
                                    <h4 class="text-danger">Enter Employees List</h4>
                                    <div class="col-md-4 warningBox2">
                                        @include('frontend.message')
                                    </div>
                                </center>
                                <div class="container">
                                    <!-- Button trigger modal -->
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <div class="col-md-6">
                                                <button type="button" class="mb-2 btn btn-sm btn-primary ms-4"
                                                    data-toggle="modal" data-target="#eModal">
                                                    Add
                                                </button>
                                            </div>

                                            <div class="col-md-6 d-flex justify-content-end">
                                                <form action="/import/excel" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <span class="text-danger me-3" id="result"></span>

                                                    <button type="button"
                                                        class="mb-2 btn btn-sm btn-primary me-4 exceluploadbtn">
                                                        <i class="bi bi-file-earmark-excel-fill"></i>
                                                    </button>

                                                    <input type="hidden" name="cusid" id="cusid"
                                                        value="{{ $segment }}">

                                                    <button type="submit"
                                                        class="mb-2 btn btn-sm btn-primary me-4 d-none addButton">
                                                        <i class="fa fa-upload"></i>
                                                    </button>

                                                    <div class="d-none">
                                                        <input type="file" name="excel" id="excel">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <button type="button" class="mb-2 btn btn-sm btn-primary reload">
                                        Refresh
                                    </button> --}}
                                    {{-- <a href="" class="mb-2 btn btn-sm btn-secondary">Refresh</a> --}}

                                    <!-- Modal -->
                                    <div class="modal fade" id="eModal" tabindex="-1" role="dialog"
                                        aria-labelledby="eModalCenterTitle" aria-hidden="true" aria-modal="hide">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Employees Details
                                                        Fill up Form
                                                    </h5>

                                                    {{-- <button type="button" class="close btn btn-sm btn-danger"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> --}}
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="" id="cusid"
                                                        value="{{ $segment }}">
                                                    <label for="" class="mt-1">Token Number</label>
                                                    <input type="text" name="tokenNo" id="tokenNo"
                                                        class="form-control">
                                                    {{-- <label for="" class="mt-1">Serial Name</label> --}}
                                                    {{-- <input type="text" name="sname" id="sname"
                                                        class="form-control"> --}}
                                                    <label for="" class="mt-1">Full Name</label>

                                                    <input type="text" name="fullName" id="fullName"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Category</label>
                                                    {{-- <input type="text" name="category" id="category"
                                                        class="form-control"> --}}

                                                    <select name="category" id="category" class="form-control">
                                                        <option value="">Select category</option>
                                                        <option value="STAFF">STAFF</option>
                                                        <option value="WORKER">WORKER</option>
                                                    </select>
                                                    <label for="" class="mt-1">Set Order</label>
                                                    <input type="number" name="setOrder" id="setOrder"
                                                        class="form-control ">
                                                    <input type="text" value="MP" id="status"
                                                        name="status" class="mt-2 form-control">
                                                    {{-- <select name="status" id="status" class="mt-2 form-control">
                                                        <option value="MEASURMENT DONE">MEASURMENT DONE</option>
                                                        <option value="MEASURMENT PENDING">MEASURMENT PENDING
                                                        </option>
                                                        <option value="PROCESSING DONE">PROCESSING DONE</option>
                                                        <option value="DIPSATCHING PENDING">DIPSATCHING PENDING
                                                        </option>
                                                        <option value="READY FOR DISPATCH PAYMENT PENDING">READY
                                                            FOR DISPATCH PAYMENT PENDING
                                                        </option>
                                                        <option value="REDY FOR DISPATCH">REDY FOR DISPATCH
                                                        </option>
                                                        <option value="DISPATCHED">DISPATCHED</option>
                                                    </select> --}}
                                                    <ul id="errstatus"></ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sm btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-primary saveData">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                        aria-labelledby="eModalCenterTitle" aria-hidden="true" aria-modal="hide">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Employees
                                                        Details
                                                        Update Form
                                                    </h5>

                                                    {{-- <button type="button" class="close btn btn-sm btn-danger"
                                                        data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button> --}}
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="e_id" id="e_id">
                                                    <label for="" class="mt-1">Token Number</label>
                                                    <input type="text" name="tokenNo" id="etokenNo"
                                                        class="form-control">
                                                    {{-- <label for="" class="mt-1">Serial Name</label> --}}
                                                    {{-- <input type="text" name="sname" id="esname"
                                                        class="form-control"> --}}

                                                    <label for="" class="mt-1">Full Name</label>

                                                    <input type="text" name="fullName" id="efullName"
                                                        class="form-control">
                                                    <label for="" class="mt-1">Category</label>
                                                    {{-- <input type="text" name="category" id="ecategory"
                                                        class="form-control"> --}}
                                                    <select name="ecategory" id="ecategory" class="form-control">
                                                        <option value="STAFF">STAFF</option>
                                                        <option value="WORKER">WORKER</option>
                                                    </select>
                                                    <label for="" class="mt-1">Set Order</label>
                                                    <input type="number" name="setOrder" id="esetOrder"
                                                        class="form-control">
                                                    <input type="text" value="MEASURMENT PENDING" id="estatus"
                                                        name="status" class="mt-2 form-control" readonly>
                                                    {{-- <select name="status" id="estatus" class="mt-2 form-control">
                                                        <option value="MEASURMENT DONE">MEASURMENT DONE</option>
                                                        <option value="MEASURMENT PENDING">MEASURMENT PENDING
                                                        </option>
                                                        <option value="PROCESSING DONE">PROCESSING DONE</option>
                                                        <option value="DIPSATCHING PENDING">DIPSATCHING PENDING
                                                        </option>
                                                        <option value="READY FOR DISPATCH PAYMENT PENDING">READY
                                                            FOR DISPATCH PAYMENT PENDING
                                                        </option>
                                                        <option value="REDY FOR DISPATCH">REDY FOR DISPATCH
                                                        </option>
                                                        <option value="DISPATCHED">DISPATCHED</option>
                                                    </select> --}}
                                                    <ul id="updaterrstatus"></ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="close btn btn-sm btn-secondary"
                                                        data-dismiss="modal">Cancel</button>

                                                    <button type="button"
                                                        class="btn btn-sm btn-primary updateData">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div id="sStatus" class="mt-2 mb-2">

                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Sr No.</th>
                                                        <th scope="col">Token Number</th>
                                                        <th scope="col">SName</th>
                                                        <th scope="col">Full Name</th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Set Order</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Remarks</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($empDetails as $key => $emp)
                                                        @if ($emp->customer_id == $segment)
                                                            <tr>
                                                                <td>{{ $key++ }}</td>
                                                                <td>{{ $emp->tokenNo }}</td>
                                                                <td>{{ $emp->id }}</td>
                                                                <td>{{ $emp->fullName }}</td>
                                                                <td> {{ $emp->category }} </td>
                                                                <td> {{ $emp->setOrder }} </td>
                                                                <td>Measurement Pending</td>
                                                                <td></td>
                                                                <td class="d-flex align-items-center">
                                                                    <button class="mb-2 edit btn"
                                                                        value="{{ $emp->id }}">
                                                                        <i class="fa-solid fa-pen-to-square"
                                                                            style="color: rgb(64, 111, 212)"></i>
                                                                    </button>
                                                                    <button type="button" class="mb-2 btn"
                                                                        data-toggle="modal" data-target="#dModal">
                                                                        <i class="fa-regular fa-trash-can"
                                                                            style="color: rgb(216, 52, 52)"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="dModal" tabindex="-1"
                                                                role="dialog" aria-labelledby="eModalCenterTitle"
                                                                aria-hidden="true" aria-modal="hide">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">

                                                                        <div class="modal-body">
                                                                            <h4>Are you sure want to delete this
                                                                                employee details
                                                                            </h4>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-sm btn-secondary"
                                                                                data-dismiss="modal">
                                                                                Cancel
                                                                            </button>

                                                                            <form
                                                                                action="/delete-empdetails/{{ $emp->id }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="btn btn-sm btn-danger">Confirm</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->
        <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
        <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
        <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
        <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
        <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script>
            $(document).ready(function() {

                $(document).on('click', '.edit', function(e) {
                    e.preventDefault();

                    var id = $(this).val();
                    // alert(id);

                    $('#editModal').modal('show');

                    $.ajax({
                        type: "GET",
                        url: "/edit-emp/" + id,
                        success: function(response) {
                            // console.log(response);
                            if (response.status == 404) {
                                $('#sStatus').html("");
                                $('#sStatus').addClass('alert alert-danger');
                                $('#sStatus').text(response.message);
                            } else {
                                $('#e_id').val(response.employee.id);
                                $('#etokenNo').val(response.employee.tokenNo);
                                $('#esname').val(response.employee.sname);
                                $('#efullName').val(response.employee.fullName);
                                $('#ecategory').val(response.employee.category);
                                $('#esetOrder').val(response.employee.setOrder);
                                $('#estatus').val(response.employee.status);
                            }
                        }
                    });

                });

                $(document).on('click', '.updateData', function(e) {
                    e.preventDefault();
                    var id = $('#e_id').val();

                    var data = {
                        'tokenNo': $('#etokenNo').val(),
                        'sname': $('#esname').val(),
                        'fullName': $('#efullName').val(),
                        'category': $('#ecategory').val(),
                        'setOrder': $('#esetOrder').val(),
                        'status': $('#estatus').val(),
                    };

                    $('.updateData').attr('disabled', true).html(
                        'Updating...');
                    $.ajax({
                        type: "post",
                        url: "/update-emp/" + id,
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 400) {
                                $('#updaterrstatus').html("");
                                $('#updaterrstatus').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#updaterrstatus').append('<li>' + err_values +
                                        '</li>');
                                });
                                $('.updateData').attr('disabled', false).html(
                                    'Try again');
                            } else if (response.status == 404) {
                                $('#errstatus').html("");
                                $('#sStatus').addClass('alert alert-danger');
                                $('#sStatus').text(response.message);
                                $('.updateData').attr('disabled', false).html(
                                    'Try again');
                            } else {
                                $('#errstatus').html("");
                                $('#sStatus').html("");
                                $('#editModal').modal('hide');
                                $('#sStatus').addClass('alert alert-success');
                                $('#sStatus').text(response.message);
                                location.reload();
                            }
                        }
                    });

                });

                $(document).on('click', '.close', function(e) {
                    e.preventDefault();
                    $('#editModal').modal('hide');
                });

                $(document).on('click', '.saveData', function(e) {
                    e.preventDefault();

                    var data = {
                        'tokenNo': $('#tokenNo').val(),
                        'sname': $('#sname').val(),
                        'fullName': $('#fullName').val(),
                        'category': $('#category').val(),
                        'setOrder': $('#setOrder').val(),
                        'status': $('#status').val(),
                        'cusid': $('#cusid').val(),

                    };

                    // console.log(data);
                    $('.saveData').attr('disabled', true).html('Adding...');

                    $.ajax({
                        type: "POST",
                        url: "/submited",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            if (response.status == 400) {

                                $('#errstatus').html("");
                                $('#errstatus').addClass('alert alert-danger');
                                $.each(response.errors, function(key, err_values) {
                                    $('#errstatus').append('<li>' + err_values + '</li>');
                                });
                                $('.saveData').attr('disabled', false).html('Try again');
                            } else {
                                $('#errstatus').html("");
                                $('#sStatus').addClass('alert alert-success');
                                $('#sStatus').text(response.message);
                                $('#eModal').modal('hide');
                                $('#eModal .modal-body').find('input').val("");
                                location.reload();
                            }
                        }
                    });
                });
            });

            $('.exceluploadbtn').click(function(e) {
                e.preventDefault();
                $('#excel').click();
            });

            $(document).ready(function() {
                const fileInput = $("#excel");
                const resultDiv = $("#result");

                fileInput.on("change", function() {
                    const selectedFile = fileInput[0].files[0];

                    if (selectedFile) {
                        const allowedExtensions = ["xlsx", "xlx", "xls",
                            "csv"
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
</body>

</html>
