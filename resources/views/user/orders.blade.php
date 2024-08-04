@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('molla/assets/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Orders</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->


        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <br>

                    <div class="row">

                        @include('user._sidebar')

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th>Order Number</th>
                                            <th>Total Amount ($)</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                
                                                <td>{{ $value->order_number }}</td>

                                                <td>{{ number_format($value->total_amount, 2) }}</td>
                                                <td style="text-transform: capitalize;">{{ $value->payment_method }}</td>
                                                <td>

                                                    @if ($value->status == 0)
                                                    Pending
                                                    @elseif($value->status == 1)
                                                    In Progress
                                                    @elseif ($value->status == 2)
                                                    Delivered
                                                    @elseif ($value->status == 3)
                                                    Completed
                                                    @elseif ($value->status == 4)
                                                    Cancelled
                                                    @endif
                                                </td>
                                                <td>{{ date('m-d-Y', strtotime($value->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('user/orders/details/' . $value->id) }}"
                                                        class="btn btn-primary">Details</a>


                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                                </div>

                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection

@section('script')

@endsection
