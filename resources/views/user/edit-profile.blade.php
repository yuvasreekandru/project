@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('molla/assets/css/plugins/nouislider/nouislider.css') }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" >
            <div class="container">
                <h1 class="page-title">Edit Profile</h1>
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
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>First Name *</label>
                                            <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Last Name *</label>
                                            <input type="text" name="last_name" value="{{ $getRecord->last_name }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <label>Email address *</label>
                                    <input type="email" name="email" value="{{ $getRecord->email }}" class="form-control" required>

                                    <label>Company Name (Optional)</label>
                                    <input type="text" name="company_name" value="{{ $getRecord->company_name }}" class="form-control">

                                    <label>Country *</label>
                                    <input type="text" name="country" value="{{ $getRecord->country }}" class="form-control" required>

                                    <label>Street address *</label>
                                    <input type="text" name="address_one" value="{{ $getRecord->address_one }}" class="form-control"
                                        placeholder="House number and Street name" required>
                                    <input type="text" name="address_two" value="{{ $getRecord->address_two }}" class="form-control"
                                        placeholder="Appartments, suite, unit etc ..." required>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Town / City *</label>
                                            <input type="text" name="city" value="{{ $getRecord->city }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>State *</label>
                                            <input type="text" name="state" value="{{ $getRecord->state }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Postcode / ZIP *</label>
                                            <input type="text" name="postcode" value="{{ $getRecord->postcode }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->

                                        <div class="col-sm-6">
                                            <label>Phone *</label>
                                            <input type="tel" name="phone" value="{{ $getRecord->phone }}" class="form-control" required>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block" style="width: 100px;">
                                        Submit
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
