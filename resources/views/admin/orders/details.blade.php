@extends('admin.layouts.app')

@section('style')
    .form-group {
    margin-bottom: 5px;
    }
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Order Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Id : <span style="font-weight: normal;">{{ $getRecord->id }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Transaction Id : <span
                                            style="font-weight: normal;">{{ $getRecord->transaction_id }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Name : <span style="font-weight: normal;">{{ $getRecord->first_name }}
                                            {{ $getRecord->last_name }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Company : <span style="font-weight: normal;">{{ $getRecord->company }}
                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>Country : <span
                                            style="font-weight: normal;">{{ $getRecord->country }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Address : <span
                                            style="font-weight: normal;">{{ $getRecord->address_one }}<br />{{ $getRecord->address_two }}
                                        </span></label>
                                </div>
                                <div class="form-group">
                                    <label>City : <span style="font-weight: normal;">{{ $getRecord->city }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>State : <span style="font-weight: normal;">{{ $getRecord->state }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Post Code : <span style="font-weight: normal;">
                                            {{ $getRecord->postcode }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Phone : <span
                                            style="font-weight: normal;">{{ $getRecord->phone }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Email : <span
                                            style="font-weight: normal;">{{ $getRecord->email }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Code : <span
                                            style="font-weight: normal;">{{ $getRecord->discount_code }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Discount Amount : <span
                                            style="font-weight: normal;">{{ number_format($getRecord->discount_amount, 2) }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Name : <span
                                            style="font-weight: normal;">{{ $getRecord->getShipping->name }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Shipping Amount : <span
                                            style="font-weight: normal;">{{ number_format($getRecord->shipping_amount, 2) }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Total Amount : <span style="font-weight: normal;">
                                            {{ number_format($getRecord->total_amount, 2) }}</span></label>
                                </div>

                                <div class="form-group">
                                    <label>Payment Method : <span
                                            style="font-weight: normal; text-transform:capitalize;">{{ $getRecord->payment_method }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Status : <span
                                            style="font-weight: normal;">{{ $getRecord->status }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Note : <span style="font-weight: normal;">{{ $getRecord->note }}</span></label>
                                </div>
                                <div class="form-group">
                                    <label>Created Date : <span
                                            style="font-weight: normal;">{{ date('d-m-Y', strtotime($getRecord->created_at)) }}</span></label>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Size Name</th>
                                            <th>Color Name</th>
                                            <th>Size Amount</th>
                                            <th>Total Amount</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord->getItem as $item)
                                            @php
                                                $getProductImage = $item->getProduct->getImageSingle(
                                                    $item->getProduct->id,
                                                );
                                            @endphp
                                            <tr>
                                                <td>
                                                    <img src="{{ $getProductImage->getLogo() }}" alt="Img"
                                                        width="100px;" height="100px;">
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{ url($item->getProduct->slug) }}">{{ $item->getProduct->title }}</a>
                                                </td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->color_name }}</td>
                                                <td>{{ $item->size_name }}</td>
                                                <td>{{ number_format($item->size_amount, 2) }}</td>
                                                <td>{{ number_format($item->total_price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('AdminLTE/dist/js/pages/dashboard3.js') }}"></script>
@endsection
