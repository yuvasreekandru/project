@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('molla/assets/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Change Password</h1>
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

                                @include('layouts.message')
                                <form action="" method="POST">
                                    @csrf


                                    <label>Old Password *</label>
                                    <input type="password" name="old_password" class="form-control" required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>New Password *</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Confirm Password *</label>
                                            <input type="password" name="cpassword" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->


                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 150px;">
                                        Update
                                    </button>
                                </form>
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
