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
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('usermakeOrder') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="mb-3 col-md-6 input-container">
                                            <label class="form-label">CUSTOMER NAME</label>
                                            <input type="text" class="form-control" name="cname" id="textbox"
                                                required>
                                            <ul class="text-center options-popup">
                                                @forelse ($customers as $cust)
                                                    <li value="{{ $cust->id }}">{{ $cust->cname }}</li>
                                                @empty
                                                    <li>Not found!</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER ADDRESS</label>
                                            <input type="text" class="form-control" name="cadd" id="cadd"
                                                required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">CUSTOMER GSTIN</label>
                                            <input type="text" class="form-control" name="cgstin" id="cgstin"
                                                required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">STYLE REFERENCE</label>
                                            <input type="text" class="form-control" name="styleref" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO NUMBER</label>
                                            <input type="text" class="form-control" name="pono">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">PO COPY UPLOAD</label>
                                            <input type="file" class="form-control" name="poimg">
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 1</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker1" class="form-control"
                                                        style="width: 100%" placeholder="Enter measurement taker name" />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mdatetime1" class="form-control"
                                                        style="width: 100%" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">MEASURMENT TAKER 2</label>
                                            <div class="col-md-12 d-flex justify-content-between">
                                                <div class="col-8">
                                                    <!-- Text input with 70% width -->
                                                    <input type="text" name="mtaker2" class="form-control"
                                                        style="width: 100%"
                                                        placeholder="Enter measurement taker name (optional)" />
                                                </div>
                                                <div class="col-3">
                                                    <!-- Date-time input with 30% width -->
                                                    <input type="date" name="mdatetime2" class="form-control"
                                                        style="width: 100%" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Email</label>
                                            <div class="d-flex align-items-center">
                                                <div class="col-md-9">
                                                    <input type="email" class="mt-1 form-control"
                                                        placeholder="Enter Email Id 1" name="email1" id="email1"
                                                        required>
                                                </div>
                                                <div class="col-md-2 ms-5">
                                                    <button id="addInput" class="btn btn-sm btn-primary">Add</button>
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
                                                        placeholder="Enter Phone Number 1" name="phone1" id="phone1"
                                                        required>
                                                </div>
                                                <div class="col-md-2 ms-5">
                                                    <button id="addInput1" class="btn btn-sm btn-primary">Add</button>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div id="inputContainer1" class="col-md-12">
                                                    <!-- Input boxes will be appended here -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <button type="submit" class="btn btn-sm btn-primary">Order</button>
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
@endsection

@section('customJs')

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

        $(document).ready(function() {
            // When the textbox is clicked, show the options popup
            $("#textbox").click(function() {
                $(".options-popup").show();
            });

            // When an option is clicked, fill the textbox with its text and hide the options popup
            $(".options-popup li").click(function() {
                var selectedOption = $(this).text();
                $("#textbox").val(selectedOption);
                $(".options-popup").hide();
            });

            // Hide the options popup when clicking outside of it
            $(document).click(function(e) {
                if (!$(e.target).closest(".input-container").length) {
                    $(".options-popup").hide();
                }
            });
        });

        $('.options-popup li').click(function() {
            let id = $(this).val();

            $.ajax({
                type: "post",
                url: "/fetchcustomer/" + id,
                data: {
                    id
                },
                dataType: "json",
                success: function(response) {
                    if (response.staus == 400) {
                        $("#textbox").val(response.errors);
                    } else {
                        $('#cadd').val(response.order.cadd)
                        $('#cgstin').val(response.order.cgstin)
                        $('#email1').val(response.order.email)
                        $('#phone1').val(response.order.phone)
                    }
                }
            });
        });
    </script>

@endsection
