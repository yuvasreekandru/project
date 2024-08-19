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
                        <h1>Notification List</h1>
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

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Notifications</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">

                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>
                                                    <a style="color:#000; {{ empty($value->is_read)? 'font-weight:bold' : ''}}" href="{{ $value->url }}?noti_id={{ $value->id }}">
                                                        {{ $value->message }}
                                                    </a>
                                                    <div>
                                                        <small>{{ date('d-m-Y h:i A', strtotime($value->created_at)) }}</small>
                                                    </div>
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
