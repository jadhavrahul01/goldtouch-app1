<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Gold Touch | Customer Order</title>

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
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <center class="position-relative">
                                    <h3>Gold Touch</h3>
                                    <h4 class="text-danger">Enter Order Details</h4>
                                    <div class="col-md-4 warningBox2">
                                        @include('frontend.message')
                                    </div>
                                </center>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="basic-form">
                                                        <form action="{{ route('makeOrder') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">CUSTOMER NAME</label>
                                                                    <input type="text" class="form-control"
                                                                        name="cname" required>
                                                                </div>

                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">CUSTOMER ADD</label>
                                                                    <input type="text" class="form-control"
                                                                        name="cadd" required>
                                                                </div>

                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">CUSTOMER GSTIN</label>
                                                                    <input type="text" class="form-control"
                                                                        name="cgstin" required>
                                                                </div>

                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Remark</label>
                                                                    <input type="text" class="form-control"
                                                                        name="remark" required>
                                                                </div>

                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Email</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="col-md-9">
                                                                            <input type="email"
                                                                                class="form-control mt-1"
                                                                                placeholder="Enter Email Id 1"
                                                                                name="email1" required>
                                                                        </div>
                                                                        <div class="col-md-2 ms-5">
                                                                            <button id="addInput"
                                                                                class="btn btn-sm btn-primary">Add</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <div id="inputContainer" class="col-md-12">
                                                                            <!-- Input boxes will be appended here -->
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="mb-3 col-md-6">
                                                                    <label class="form-label">Phone</label>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Enter Phone Number 1"
                                                                                name="phone1" required>
                                                                        </div>
                                                                        <div class="col-md-2 ms-5">
                                                                            <button id="addInput1"
                                                                                class="btn btn-sm btn-primary">Add</button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <div id="inputContainer1" class="col-md-12">
                                                                            <!-- Input boxes will be appended here -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-primary">Order
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            var maxInputBoxes = 4; // Maximum number of input boxes allowed
            var inputCount = 0; // Current input box count
            var num = 2;

            function addInputBox() {
                if (inputCount < maxInputBoxes) {
                    // Create a new input element
                    var inputElement = $("<div>")
                        .addClass("input-container")
                        .append(
                            $("<input>").attr({
                                type: "email",
                                name: "email" + num, // Incrementing name
                                class: "input-box form-control mt-2",
                                placeholder: "Enter Email Id " + num + " (optional)",
                            })
                        )
                        .append(

                            $("<button>").text("Remove").attr({
                                class: "btn btn-sm btn-danger remove-button mt-2",
                            })
                        )

                    // Append the input element to the container
                    $("#inputContainer").append(inputElement);

                    // Increment the input count
                    inputCount++;
                    num++;
                    // Attach a click event handler to the Remove button
                    $(".remove-button").click(function() {
                        $(this).closest(".input-container").remove();
                        inputCount--;
                        num--;
                    });
                } else {
                    alert("You can add only 5 email ids at once");
                }
            }

            // Initial call to addInputBox function
            addInputBox();

            $("#addInput").click(function() {
                addInputBox();
            });
        });

        $(document).ready(function() {
            var maxInputBoxes = 4; // Maximum number of input boxes allowed
            var inputCount = 0; // Current input box count
            var num = 2;

            function addInputBox() {
                if (inputCount < maxInputBoxes) {
                    // Create a new input element
                    var inputElement = $("<div>")
                        .addClass("input-container1")
                        .append(
                            $("<input>").attr({
                                type: "number",
                                name: "phone" + num, // Incrementing name
                                class: "input-box form-control mt-2",
                                placeholder: "Enter Phone Number " + num + " (optional)",
                            })
                        )
                        .append(

                            $("<button>").text("Remove").attr({
                                class: "btn btn-sm btn-danger remove-button1 mt-2",
                            })
                        )

                    // Append the input element to the container
                    $("#inputContainer1").append(inputElement);

                    // Increment the input count
                    inputCount++;
                    num++;

                    // Attach a click event handler to the Remove button
                    $(".remove-button1").click(function() {
                        $(this).closest(".input-container1").remove();
                        inputCount--;
                        num--;
                    });
                } else {
                    alert("You can add only 5 phone numbers at once");
                }
            }

            // Initial call to addInputBox function
            addInputBox();

            $("#addInput1").click(function() {
                addInputBox();
            });
        });
    </script>
</body>

</html>
