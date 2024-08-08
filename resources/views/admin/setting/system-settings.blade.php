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
                        <h1>System Setting</h1>
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
                                        <label>Website <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="website_name"
                                            value="{{ $getRecord->website_name }}">

                                    </div>
                                    <div class="form-group">
                                        <label>Logo <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="logo">
                                        @if (!empty($getRecord->getLogo()))
                                            <img src="{{ $getRecord->getLogo() }}" style="width:50px;" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>favicon <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="favicon">
                                        @if(!empty($getRecord->getfavicon()))
                                            <img src="{{ $getRecord->getfavicon() }}" style="width:50px;" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Description <span style="color: red"></span></label>
                                        <textarea class="form-control" name="footer_description">{{ $getRecord->footer_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Payment Icon <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="footer_payment_icon">
                                        @if(!empty($getRecord->getFooterPayment()))
                                            <img src="{{ $getRecord->getFooterPayment() }}" style="width:50px;" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Address <span style="color: red"></span></label>
                                        <textarea class="form-control" name="address">{{ $getRecord->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $getRecord->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone 2<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="phone_two"
                                            value="{{ $getRecord->phone_two }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Submit Contact Email <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="submit_email"
                                            value="{{ $getRecord->submit_email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ $getRecord->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email 2<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="email_two"
                                            value="{{ $getRecord->email_two }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Working Hour <span style="color: red"></span></label>
                                        <textarea class="form-control" name="working_hour">{{ $getRecord->working_hour }}</textarea>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label>Facebook Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="facebook_link"
                                            value="{{ $getRecord->facebook_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Twitter Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="twitter_link"
                                            value="{{ $getRecord->twitter_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="instagram_link"
                                            value="{{ $getRecord->instagram_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Youtube Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="youtube_link"
                                            value="{{ $getRecord->youtube_link }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Pinterest Link<span style="color: red"></span></label>
                                        <input type="text" class="form-control" name="pinterest_link"
                                            value="{{ $getRecord->pinterest_link }}">
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
