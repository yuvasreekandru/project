@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Home Setting</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('layouts.message')
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Trendy Product Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="trendy_product_title"
                                            value="{{ $getRecord->trendy_product_title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Shop Category Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="shop_category_title"
                                            value="{{ $getRecord->shop_category_title }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Recent Arrival Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="recent_arrival_title"
                                            value="{{ $getRecord->recent_arrival_title }}"required>
                                    </div>
                                    <div class="form-group">
                                        <label>Blog Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="blog_title"
                                            value="{{ $getRecord->blog_title }}" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Payment Delivery Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="payment_delivery_title"
                                            value="{{ $getRecord->payment_delivery_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Payment_Delivery_Description <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="payment_delivery_description"
                                            value="{{ $getRecord->payment_delivery_description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Delivery Image <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="payment_delivery_image">
                                        @if (!empty($getRecord->getPaymentImage()))
                                            <img src="{{ $getRecord->getPaymentImage() }}" style="width: 200px"
                                                alt="">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Refund Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="refund_title"
                                            value="{{ $getRecord->refund_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Refund Description <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="refund_description"
                                            value="{{ $getRecord->refund_description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Refund Iimage <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="refund_image">
                                        @if (!empty($getRecord->getRefundImage()))
                                            <img src="{{ $getRecord->getRefundImage() }}" style="width: 200px"
                                                alt="">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Support Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="support_title"
                                            value="{{ $getRecord->support_title }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Support Description <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="support_description"
                                            value="{{ $getRecord->support_description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Support Image<span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="support_image">
                                        @if (!empty($getRecord->getSupportImage()))
                                            <img src="{{ $getRecord->getSupportImage() }}" style="width: 200px"
                                                alt="">
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Signup Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="signup_title"
                                            value="{{ $getRecord->signup_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Signup Description <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="signup_description"
                                            value="{{ $getRecord->signup_description }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Signup Image <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="signup_image">
                                        @if (!empty($getRecord->getSignupImage()))
                                            <img src="{{ $getRecord->getSignupImage() }}" style="width: 200px"
                                                alt="">
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                    </div>
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
