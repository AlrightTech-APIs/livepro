@extends('admin.master')
@section('title','admin dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-12">
                        <h3 class="page-title">Welcome {{ auth()->user()->name }}!</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="far fa-user"></i>
                                </span>
                                <div class="dash-widget-info">
                                    <h3>{{ $user->count() }}</h3>
                                    <h6 class="text-muted">Users</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="fas fa-hashtag"></i>
                                </span>
                                <div class="dash-widget-info">
                                    <h3>{{ $dnc }}</h3>
                                    <h6 class="text-muted">DNC</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="fas fa-qrcode"></i>
                                </span>
                                <div class="dash-widget-info">
                                    <h3>{{ $lead }}</h3>
                                    <h6 class="text-muted">Leads</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-primary">
                                    <i class="far fa-credit-card"></i>
                                </span>
                                <div class="dash-widget-info">
                                    <h3>{{ $sanitized }}</h3>
                                    <h6 class="text-muted">Scrubbed</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Recent Scrubbings</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($santized_file as $file)
                                            <tr>
                                            <td>{{ $file->user->name }}</td>
                                            <td class="text-nowrap">{{ $file->created_at }}</td>
                                            <td>
                                                <a href="{{ Storage::url($file->file) }}"
                                                    class="btn btn-sm bg-success-light me-2" download> <i
                                                        class="fas fa-download me-1"></i></a>
                                            </td>
                                        </tr> 
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 d-flex">

                    <div class="card card-table flex-fill">
                        <div class="card-header">
                            <h4 class="card-title">Payments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-center">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>User</th>
                                            <th>Email</th>
                                            <th>File Sanitized</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                             <tr>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <span class="table-avatar">
                                                   {{ $user->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="table-avatar">
                                                    {{ $user->email }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-dark">{{ $user->sanitized->count() }}</span>
                                            </td>
                                        </tr> 
                                        @endforeach
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
<!-- End of Main Content -->