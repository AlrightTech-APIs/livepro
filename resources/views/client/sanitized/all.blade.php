@extends('client.master')
@section('title','Scrubbeds')
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            {{-- <div class="col-xl-3 col-md-4 theiaStickySidebar">
                <div class="mb-4">
                    <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                        <img alt="profile image" src="assets/img/provider/provider-01.jpg"
                            class="avatar-lg rounded-circle">
                        <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                            <h6 class="mb-0">Thomas Herzberg</h6>
                            <p class="text-muted mb-0">Member Since Apr 2020</p>
                        </div>
                    </div>
                </div>
                <div class="widget settings-menu">
                    <ul>
                        <li class="nav-item">
                            <a href="provider-dashboard.html" class="nav-link">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="my-services.html" class="nav-link">
                                <i class="far fa-address-book"></i> <span>My Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-bookings.html" class="nav-link">
                                <i class="far fa-calendar-check"></i> <span>Booking List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-settings.html" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-wallet.html" class="nav-link">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-subscription.html" class="nav-link active">
                                <i class="far fa-calendar-alt"></i> <span>Subscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-availability.html" class="nav-link">
                                <i class="far fa-clock"></i> <span>Availability</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-reviews.html" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="provider-payment.html" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <div class="col-xl-9 col-md-8 m-auto">
                <div class="row pricing-box">
                    @foreach ($sanitized as $file)
                       <div class="col-xl-4 col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="pricing-header">
                                    <h2>{{ Str::substr(str_replace('public/sanitized/sanitized_','',$file->file),-25)  }}</h2>
                                </div>
                                <div class="pricing-card-price">
                                    <p>Scrubbed: <span>{{  $file->created_at->diffForHumans() }}</span></p>
                                </div>
                                <a href="{{ Storage::url($file->file) }}" class="btn btn-success btn-block w-100" download="">Download</a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                    
                </div>
                {{-- <div class="card">
                    <div class="card-body">
                        <div class="plan-det">
                            <h6 class="title">Plan Details</h6>
                            <ul class="row">
                                <li class="col-sm-4">
                                    <p><span class="text-muted">Started On</span> 15 Jul 2020</p>
                                </li>
                                <li class="col-sm-4">
                                    <p><span class="text-muted">Price</span> $1502.00</p>
                                </li>
                                <li class="col-sm-4">
                                    <p><span class="text-muted">Expired On</span> 15 Jul 2021</p>
                                </li>
                            </ul>
                            <h6 class="title">Last Payment</h6>
                            <ul class="row">
                                <li class="col-sm-4">
                                    <p>Paid at 15 Jul 2020</p>
                                </li>
                                <li class="col-sm-4">
                                    <p><span class="amount">$1502.00 </span> <span
                                            class="badge bg-success-light">Paid</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                <h5 class="mb-4">Subscribed Details</h5>
                <div class="card transaction-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center mb-0 no-footer">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>File</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sanitized as $file)
                                    <tr>
                                        <td>{{ $file->user->name }}</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td>{{ str_replace('public/sanitized/sanitized_','',$file->file)  }}</td>
                                        <td>
                                            <a href="{{ Storage::url($file->file) }}" class="btn btn-success" download="">Download</a>
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