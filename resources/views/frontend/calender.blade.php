@extends('frontend.includes.app')
@section('title', 'Calendar')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Calendar</a></li>
                </ol>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-md-12 position-relative">
                    <div class="col-md-4 warningBox2">
                        @include('frontend.message')
                    </div>
                </div>

                <div id="sStatus" class="mt-2 mb-2">

                </div>

                <!-- Modal -->
                <div class="modal fade" id="title" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>
                                <span class="close closebtn btn-modal-close" data-dismiss="modal" aria-label="Close"
                                    aria-hidden="true">
                                    &times;
                                </span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <ul id="errstatus"></ul>
                                <input type="text" name="title" id="titleData" class="form-control"
                                    placeholder="Enter Title of the event" required autofocus>
                                <input type="text" name="assignName1" id="assignName1" class="mt-2 form-control"
                                    placeholder="Enter Name 1" required>
                                <input type="text" name="assignName2" id="assignName2" class="mt-2 form-control"
                                    placeholder="Enter Name 2" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect btn-modal-close"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>

                                <button type="button" id="saveData"
                                    class="btn btn-success save-event waves-effect waves-light">
                                    Create event
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="export" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="events/export/" method="get">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>
                                    <span class="close closebtn btn-modal-close" data-dismiss="modal" aria-label="Close"
                                        aria-hidden="true">
                                        &times;
                                    </span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <input class=" form-control" type="date" name="start_date" id="">
                                        @error('start_date')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mt-2 col-md-12">
                                        <input class=" form-control" type="date" name="end_date" id="">
                                        @error('end_date')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success save-event waves-effect waves-light">
                                        Export
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="mt-5 ">
                            <div class="col-sm-3">
                                {{-- <a class="btn btn-sm btn-success" href="events/export/">
                                            <i class="fa fa-file-excel"></i>
                                        </a> --}}
                                <button type="button" class="btn btn-sm btn-success ms-5" data-toggle="modal"
                                    data-target="#export">
                                    <i class="fa fa-file-excel"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="calendar" class="">
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
        "use strict";

        function fullCalender() {

            var tasks = @json($tasks);
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay",
                },
                events: tasks,
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    $('#title').modal('toggle');

                    $('#saveData').click(function() {
                        var title = $('#titleData').val();
                        var assign1 = $('#assignName1').val();
                        var assign2 = $('#assignName2').val();
                        var start_date = moment(arg.start).format('YYYY-MM-DD');
                        var end_date = moment(arg.end).format('YYYY-MM-DD');
                        // console.log(start_date);
                        // console.log(end_date);

                        $('#saveData').attr('disabled', true).html('Creating...');

                        $.ajax({
                            type: "post",
                            url: "{{ route('calendar.event') }}",
                            data: {
                                title,
                                assign1,
                                assign2,
                                start_date,
                                end_date
                            },
                            dataType: "json",
                            success: function(response) {
                                if (response.status == 400) {

                                    $('#errstatus').html("");
                                    $('#errstatus').addClass('alert alert-danger');
                                    $.each(response.errors, function(key, err_values) {
                                        $('#errstatus').append('<li>' + err_values +
                                            '</li>');
                                    });
                                    $('#saveData').attr('disabled', false).html(
                                        'Try Again');
                                } else if (response.status == 403) {

                                    $('#errstatus').html("");
                                    $('#errstatus').addClass('alert alert-danger');

                                    $('#errstatus').append('<li>' + response.errors +
                                        '</li>');

                                    $('#saveData').attr('disabled', false).html(
                                        'Not Allowed');
                                } else {
                                    $('#errstatus').html("");
                                    $('#sStatus').addClass('alert alert-success');
                                    $('#sStatus').text(response.message);
                                    $('#saveData').attr('disabled', false).html(
                                        'Create event');
                                    $('#title').modal('hide');
                                    $('#title .modal-body').find('input').val("");
                                    location.reload(true);
                                }
                            }
                        });
                    });
                    calendar.unselect();
                },
                // editable: true,
                // droppable: true, // this allows things to be dropped onto the calendar
                // drop: function(arg) {
                //     // is the "remove after drop" checkbox checked?
                //     if (document.getElementById("drop-remove").checked) {
                //         // if so, remove the element from the "Draggable Events" list
                //         arg.draggedEl.parentNode.removeChild(arg.draggedEl);
                //     }
                // },
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                // editable: true,
                selectable: true,
                nowIndicator: true,

            });
            calendar.render();
        }

        jQuery(window).on("load", function() {
            setTimeout(function() {
                fullCalender();
            }, 1000);
        });

        $('.btn-modal-close').click(function() {
            $('#title').modal('hide');
            $('#title .modal-body').find('input').val("");
            $('#errstatus').html("");
            $('#errstatus').removeClass('alert alert-danger');
        });

        $('.btn-close-modal').click(function() {
            $('#export').modal('hide');
        });
    </script>
@endsection
