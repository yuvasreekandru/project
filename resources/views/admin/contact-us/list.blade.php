@extends('admin.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contact Us List</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('admin.layouts.message')
                        <form action="" method="GET">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Us</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>Id</label>
                                                <input type="text" name="id" class="form-control" placeholder="Id"
                                                    value="{{ Request::get('id') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Name" value="{{ Request::get('name') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control"
                                                    placeholder="Email" value="{{ Request::get('email') }}">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control"placeholder="Phone"
                                                    value="{{ Request::get('phone') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" name="subject" class="form-control"placeholder="subject"
                                                    value="{{ Request::get('subject') }}">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn btn-primary">Search</button>
                                            <a href="{{ url('admin/contact-us/list') }}" class="btn btn-primary">Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Contact List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Login Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Created Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ !empty($value->getUser) ? $value->getUser->name : '' }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->phone }}</td>
                                                <td>{{ $value->subject }}</td>
                                                <td>{{ $value->message }}</td>
                                                <td>{{ $value->created_at }}</td>

                                                <td>
                                                    <a href="{{ url('admin/contact-us/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>

                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                    {{ $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
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
