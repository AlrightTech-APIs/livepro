@extends('admin.master')
@section('title', 'Manage Projects')
<!-- Begin Page Content -->
@section('content')

    <!-- main Section for table  -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Scrubed Files</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0 datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Download</th>
                                            <th class="text-end">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sanitized as $sanitize)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sanitize->user->name }}</td>
                                                <td>{{ $sanitize->created_at }}</td>
                                                <td>{{ Str::limit(str_replace('public/sanitized/', '', $sanitize->file), $limit = 30, '...') }}
                                                </td>
                                                <td>
                                                    <a href="{{ Storage::url($sanitize->file) }}"
                                                        class="btn btn-sm bg-success-light me-2" download> <i
                                                            class="fas fa-download me-1"></i> Download</a>
                                                <td class="text-end">
                                                    <a class="btn btn-sm bg-danger-light me-2" id="deletebtn" href=""
                                                        onclick="event.preventDefault();
                                                            document.getElementById('delete-dnc-form-{{ $sanitize->id }}').submit();">
                                                        <i class="fas fa-trash me-1"></i> Delete
                                                    </a>
                                                    <form id="delete-dnc-form-{{ $sanitize->id }}"
                                                        action="{{ route('delete.sanitized', $sanitize->id) }}" method="POST"
                                                        class="d-none">
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
<!-- Delete Modal-->
@section('model')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are sure to delete File</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" id="deletebtn" href=""
                        onclick="event.preventDefault();
                                  document.getElementById('delete-dnc-form').submit();">
                        {{ __('Delete') }}
                    </a>
                    <form id="delete-dnc-form" action="" method="POST" class="d-none">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
