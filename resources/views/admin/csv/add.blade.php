@extends('admin.master')
@section('title','dashboard')
@section('manage-properties','active')
<!-- Begin Page Content -->
@section('links')
<link rel="stylesheet" href="{{asset('md5/css/mdb.min.css')}}" />
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project Management</h1>

        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="col-xl-9 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add CSV</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <!-- <div class="chart-area"> -->
                    <div class="container">
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
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-sm-12">
                                <form method="POST" action="{{ route('admin.store.csv') }}" enctype="multipart/form-data">
                                    <!-- Name input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form4Example1">Column Name of Phone Numbers</label>
                                        <input type="text" name="colomn" value="{{ old('title') }}" id="form4Example1" class="form-control" />
                                    </div>
                                    @csrf
                                    <div class="form mb-4">
                                        <label for="formFileMultiple" class="form-label">Upload CSV File</label>
                                        <input class="form-control" name="csv" type="file" id="formFileMultiple"/>
                                    </div>
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4" >save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
<!-- End of Main Content -->

@section('script')
<script type="text/javascript" src="{{asset('md5/js/mdb.min.js')}}"></script>
@endsection