@extends('admin.master')
@section('title','dashboard')
@section('manage-properties','active')
<!-- Begin Page Content -->
@section('links')
<link rel="stylesheet" href="{{asset('md5/css/mdb.min.css')}}" />
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Manage Profile</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    {{-- <x-app-layout> --}}
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('admin.profile.partials.update-profile-information-form')
                                    </div>
                                </div>
                    
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('admin.profile.partials.update-password-form')
                                    </div>
                                </div>
                    
                                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                                    <div class="max-w-xl">
                                        @include('admin.profile.partials.delete-user-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </x-app-layout>                     --}}

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