@extends('client.master')
@section('title', 'Scrubbing')
@section('content')
    <div class="content" style="min-height: 470px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>Real-time Scrub Single Number</h2>
                    </div>
                    <form action="{{ route('user.store.single') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="service-fields mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Number</label>
                                        <input class="form-control @error('number') is-invalid @enderror" name="number"
                                            type="number" value="{{ old('number') ?? session()->get('number') }}"
                                            placeholder="+14705773218">
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">Scrub</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
