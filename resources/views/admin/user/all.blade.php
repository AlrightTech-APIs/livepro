@extends('admin.master')
@section('title', 'Manage Users')

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Users</h3>
                    </div>
                    <div class="col-auto text-end">
                        <a href="{{ route('admin.add.user') }}" class="btn btn-primary add-button ms-3">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>


            {{-- <div class="card filter-card" id="filter_inputs">
            <div class="card-body pb-0">
                <form>
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>From Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Signup Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        {{-- <a href="#" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-circle"
                                                                src="assets/img/customer/user-01.jpg" alt="User Image">
                                                        </a> --}}
                                                        <a>{{ $user->name }}</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    {{ $user->email }}
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit.user', $user->id) }}"
                                                        class="btn btn-sm bg-success-light me-2"> <i
                                                            class="fas fa-edit me-1"></i> Edit</a>
                                                    <a class="btn btn-sm bg-danger-light me-2" id="deletebtn" href=""
                                                        onclick="event.preventDefault();
                                                                document.getElementById('delete-dnc-form-{{ $user->id }}').submit();">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                    <form id="delete-dnc-form-{{ $user->id }}"
                                                        action="{{ route('admin.delete.user', $user->id) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
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
@endsection
