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
                        <h1>Payment Setting</h1>
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
                                        <label style="display: block;">Cash On Delivery (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" {{ !empty($getRecord->is_cash_delivery) ? 'checked' : ''}} name="is_cash_delivery">
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">Paypal (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" {{ !empty($getRecord->is_paypal) ? 'checked' : ''}} name="is_paypal">
                                    </div>

                                    <div class="form-group">
                                        <label>Paypal Email Id <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="paypal_id"
                                            value="{{ $getRecord->paypal_id }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Paypal Status<span style="color: red"></span></label>
                                        <select class="form-control" name="paypal_status" id="">
                                            <option {{ ($getRecord->paypal_status == 'sandbox') ? 'selected' : '' }} value="sandbox">Sandbox</option>
                                            <option {{ ($getRecord->paypal_status == 'live') ? 'selected' : '' }} value="live">Live</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label style="display: block;">Stripe (On / Off)<span style="color: red"></span></label>
                                        <input type="checkbox" {{ !empty($getRecord->is_stripe) ? 'checked' : ''}} name="is_stripe">
                                    </div>
                                    <div class="form-group">
                                        <label>Stripe Public key <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="stripe_public_key"
                                            value="{{ $getRecord->stripe_public_key }}" >
                                    </div>
                                    <div class="form-group">
                                        <label>Stripe Secret Key <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="stripe_secret_key"
                                            value="{{ $getRecord->stripe_secret_key }}" >
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
