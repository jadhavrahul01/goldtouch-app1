@extends('frontend.includes.app')
@section('title', 'Orders')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="flex-wrap mb-sm-4 d-flex align-items-center text-head ">
                <h2 class="mb-3 me-auto">Orders</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="text-white fas fa-reorder bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0 font-w600">{{ $aordersCount }}</h2>
                                    <p class="mb-0 font-w500">Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="text-white fas fa-clock bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0 font-w600">{{ $pedingOrders }}</h2>
                                    <p class="mb-0 font-w500">Pending Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="text-white fas fa-check bg-primary"></i>
                                </div>

                                <div class="ms-4 customer">
                                    <h2 class="mb-0 font-w600">{{ $fabricStatus }}</h2>
                                    <p class="mb-0 font-w500">Completed Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 statusBox">
                    <div id="sStatus" class="status">

                    </div>
                </div>

                <div class="col-md-4 warningBox">
                    @include('frontend.message')
                </div>

                <div class="col-xl-12">
                    <div class="flex-wrap d-flex align-items-center">
                        <div class="mb-3 table-search pe-3">
                            <form action="" method="get">
                                <div class="input-group search-area">
                                    <input type="text" name="c" class="form-control"
                                        placeholder="Search customer name here" value="{{ Request::get('c') }}" required>

                                    <button type="submit" class="btn btn-sm input-group-text">
                                        <i class="flaticon-381-search-2"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('orders') }}" class="mb-3 btn btn-warning">
                            <i class="fas fa-redo-alt"></i>
                        </a>

                        <div class="mb-3 pe-3 excelbtn">
                            <a href="/orders/export/" class="btn btn-success">
                                <i class="fa fa-file-excel"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="table-responsive fs-14">
                        <table class="table mb-4 display dataTablesCard order-table shadow-hover card-table" id="example5">
                            <thead>
                                <tr class="text-center">
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>GSTIN No.</th>
                                    <th>Phone</th>
                                    <th>Order Progress</th>
                                    <th>Order Status</th>
                                    <th class="">Edits</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                @forelse ($orders as $od)
                                    <tr>
                                        <td>
                                            <a href="/order-edit/{{ $od->id }}">
                                                #{{ $od->order_id }}
                                            </a>
                                        </td>

                                        <td><a href="/order-edit/{{ $od->id }}">{{ $od->cname }}</a></td>

                                        <td class="text-ov"><a
                                                href="/order-edit/{{ $od->id }}">{{ $od->cgstin }}</a></td>
                                        <td><a href="/order-edit/{{ $od->id }}">{{ $od->phone }}</a></td>

                                        <td>
                                            @if ($od->fabrics_status == 2)
                                                <h6 class="mt-4">
                                                    <span class="pull-end">{{ progressbar($od->u_id, $od->id) }}%</span>
                                                </h6>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info progress-animated"
                                                        style="width: {{ progressbar($od->u_id, $od->id) }}%; height:6px;"
                                                        role="progressbar">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                            @elseif ($od->fabrics_status == 1)
                                                <span class="text-danger">Cancelled</span>
                                            @elseif ($od->fabrics_status == 3)
                                                <span class="text-warning">On Hold</span>
                                            @elseif ($od->fabrics_status == 0)
                                                <span class="text-warning">pending</span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($od->fabrics_status == 1)
                                                <span class="text-danger">Not Available</span>
                                            @elseif ($od->fabrics_status == 2)
                                                <span class="text-success">Available</span>
                                            @elseif ($od->fabrics_status == 3)
                                                <span class="text-danger">On Hold</span>
                                            @else
                                                <span class="text-warning">Pending</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="dropdown ms-auto c-pointer">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
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
                                                    @if (Auth::user()->role == 2)
                                                        <form action="/accept/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-black dropdown-item">
                                                                Available
                                                            </button>
                                                        </form>
                                                        <form action="/reject/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-black dropdown-item">
                                                                Not Available
                                                            </button>
                                                        </form>
                                                        <form action="/hold/{{ $od->id }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-black dropdown-item">
                                                                Hold
                                                            </button>
                                                        </form>
                                                        <input type="hidden" name="cid" id="cid"
                                                            value="{{ $od->u_id }}">
                                                        <input type="hidden" name="cname" id="cname"
                                                            value="{{ $od->cname }}">
                                                        <input type="hidden" name="email" id="email"
                                                            value="{{ $od->email }}">
                                                    @endif
                                                    @if ($od->fabrics_status == 2)
                                                        <form action="/send-mail/{{ $od->id }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="text-black dropdown-item">
                                                                Send Mail
                                                            </button>
                                                        </form>
                                                    @else
                                                        @if (Auth::user()->role == 1)
                                                            <span class="tyext-warning">
                                                                You can send mail when fabric is
                                                                available
                                                            </span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No records found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



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
@endsection
