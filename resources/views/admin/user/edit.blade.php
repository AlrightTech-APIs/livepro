@extends('admin.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Edit User</h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.update.user',$user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')  
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" type="text">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $user->email }}" disabled>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pasword</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" name="password_confirmation" >
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Update User</button>
                                <a href="categories.html" class="btn btn-link">Cancel</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

