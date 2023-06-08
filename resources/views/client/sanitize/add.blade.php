@extends('client.master')
@section('title', 'Scrubbing')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>File Scrubber</h2>
                    </div>
                    @if(session()->has('file'))
                    <div class="alert d-flex justify-content-center">
                        <a class="btn btn-success" href="{{ Storage::url(session()->get('file')) }}" download>Download Sanitized File</a>
                    </div>
                    @endif
                    <form action="{{ route('user.store.sanitize') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Column Number <span class="text-danger">*</span></label>
                                        <input type="number" name="cloumn" class="form-control @error('cloumn') is-invalid @enderror">
                                        @error('cloumn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-fields mb-3">
                            <h3 class="heading-2">File for Scrubbing</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="service-upload">
                                        <i class="fas fa-cloud-upload-alt"></i> <span>Upload csv or xls file *</span>
                                        <input type="file" name="sanitize">
                                    </div>
                                    @error('sanitize')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
