@extends('admin.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">

                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Add Lead</h3>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @if(session()->has('file'))
                        <div class="alert d-flex justify-content-center">
                            <a class="btn btn-success" href="{{ Storage::url(session()->get('file')) }}" download>Download Sanitized File</a>
                        </div>
                        @endif
                        <form action="{{ route('admin.store.sanitize') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Cloumn</label>
                                <input class="form-control" name="column" type="number">
                            </div>
                            <div class="form-group">
                                <label>Lead</label>
                                <input class="form-control" name="sanitize" type="file">
                            </div>
                            <div class="mt-4">
                                <button class="btn btn-primary" type="submit">Add Lead</button>
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

