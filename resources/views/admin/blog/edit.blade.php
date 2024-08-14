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
                        <h1>Edit Blog</h1>
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
                                        <label>Title<span style="color: red">*</span></label>
                                        <input type="text" class="form-control" value="{{ $getRecord->title }}"
                                            name="title" required placeholder="Title">
                                        <div style="color: red;">{{ $errors->first('title') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name <span style="color: red">*</span></label>
                                        <select class="form-control" name="blog_category_id" required>
                                            <option value="">Select</option>
                                            @foreach ($getCategory as $category)
                                                <option
                                                    {{ $getRecord->blog_category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Image<span style="color: red"></span></label>
                                        <input type="file" class="form-control" name="image_name">
                                        @if (!empty($getRecord->getImage()))
                                            <img src="{{ $getRecord->getImage() }}"  height="200px" alt="">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Description<span style="color: red"></span></label>
                                        <textarea class="form-control editor" name="description">{{ $getRecord->description }}</textarea>
                                        <div style="color: red;">{{ $errors->first('description') }}</div>
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
                                    <hr>

                                    <div class="form-group">
                                        <label>Meta Title<span style="color: red">*</span></label>
                                        <input class="form-control" value="{{ $getRecord->meta_title }}" name="meta_title"
                                            placeholder="Meta Title">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" name="meta_description" placeholder="Meta Description">{{ $getRecord->meta_description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keywords</label>
                                        <input type="text" class="form-control" value="{{ $getRecord->meta_keywords }}"
                                            name="meta_keywords" placeholder="Meta Keywords">
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
@endsection
