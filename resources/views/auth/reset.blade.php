@extends('layouts.app')

@section('style')
@endsection
@section('content')
    <main class="main">

        <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url({{ asset('molla/assets/images/backgrounds/login-bg.jpg')}} )">
            <div class="container">
                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Reset Password</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="" style="display: block;">

                                @include('layouts.message')

                                <form action="" method="POST">
                                    @csrf

                                    <div class="form-group" style="margin-top: 40px;">
                                        <label for="singin-email-2">Password *</label>
                                        <input type="password" class="form-control" id="singin-email-2" name="password" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="singin-email-2">Confirm Password *</label>
                                        <input type="password" class="form-control" id="singin-email-2" name="confirm_password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Reset</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </div><!-- End .form-footer -->
                                </form>

                            </div><!-- .End .tab-pane -->

                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .container -->
        </div><!-- End .login-page section-bg -->
    </main><!-- End .main -->
@endsection

@section('script')

@endsection
