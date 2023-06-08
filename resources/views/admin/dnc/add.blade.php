@extends('admin.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Add DNC</h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        <form action="{{ route('admin.store.dnc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Number</label>
                                <input class="form-control" name="number" type="number">
                            </div>
                            <div class="form-group">
                                <label>Cloumn</label>
                                <input class="form-control" name="column" type="number">
                            </div>
                            <div class="form-group">
                                <label>DNC</label>
                                <input class="form-control" name="dnc" type="file">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Add DNC</button>
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

