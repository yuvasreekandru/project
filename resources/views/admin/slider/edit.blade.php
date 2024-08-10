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
                        <h1>Edit Slider</h1>
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
                            <!-- form start -->
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Title <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->title }}"
                                            name="title" required placeholder="Title">
                                    </div>

                                    <div class="form-group">
                                        <label>Image<span style="color: red"></span></label>
                                        <input type="file" class="form-control"
                                            name="image_name" >
                                        @if (!empty($getRecord->getImage()))
                                            <img src="{{ $getRecord->getImage() }}" height="100px" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Button Name<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->button_name }}"
                                            name="button_name" required placeholder="Button Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Button Link<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->button_link }}"
                                            name="button_link" required placeholder="Button Link">
                                    </div>

                                    <div class="form-group">
                                        <label>Status<span style="color: red">*</span></label>
                                        <select class="form-control" name="status" required>
                                            <option {{ $getRecord->status == 0 ? 'selected' : '' }} value="0">Active
                                            </option>
                                            <option {{ $getRecord->status == 1 ? 'selected' : '' }} value="1">InActive
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
