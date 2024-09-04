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
                        <h1>SMTP Setting</h1>
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
                                        <label>Website Name <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $getRecord->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Mailer <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_mailer"
                                            value="{{ $getRecord->mail_mailer }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Host <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_host"
                                            value="{{ $getRecord->mail_host }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Port <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_port"
                                            value="{{ $getRecord->mail_port }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Username <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_username"
                                            value="{{ $getRecord->mail_username }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Password <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_password"
                                            value="{{ $getRecord->mail_password }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Encryption <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_encryption"
                                            value="{{ $getRecord->mail_encryption }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mail From Address <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="mail_from_address"
                                            value="{{ $getRecord->mail_from_address }}" required>
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
