@extends('admin.layouts.app')

@section('style')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Page</h1>
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
                                        <label>Name <span style="color: red"></span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->name }}"
                                            name="name">
                                    </div>
                                    <div class="form-group">
                                        <label>Title <span style="color: red"></span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->title }}"
                                            name="title">
                                    </div>
                                    <div class="form-group">
                                        <label>Image <span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="image">
                                        @if (!empty($getRecord->getImage()))
                                            <img src="{{ $getRecord->getImage() }}" width="200px" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Description <span style="color: red"></span></label>
                                        <textarea class="form-control editor" name="description">{{ $getRecord->description }}</textarea>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <label>Meta Title<span style="color: red"></span></label>
                                        <input class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{ $getRecord->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}"
                                            name="meta_keywords">
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
    <!-- Summernote -->
    <script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>

        $(function () {
            // Summernote
            $('.editor').summernote({
                height:300
            });

          });
        </script>

@endsection
