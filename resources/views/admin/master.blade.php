<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>BHD-@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/logo/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/select2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/admin.css') }}">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('links')
</head>

<body>
    <div class="main-wrapper" style="height:100vh">
        
        <div class="header">
            <div class="header-left">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-small">
                    <img src="{{ asset('admin/assets/img/logo.png') }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <a class="mobile_btn" id="mobile_btn" href="javascript:void(0);">
                <i class="fas fa-align-left"></i>
            </a>
            <ul class="nav user-menu">



                <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle user-link  nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('assets/img/user.jpg') }}" width="40" alt="Admin">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        {{-- <a class="dropdown-item" href="{{ route('logout') }}">Logout</a> --}}
                        <a class="dropdown-item" id="deletebtn" href=""
                        onclick="event.preventDefault();
                            document.getElementById('delete-dnc-form').submit();">
                       <i class="fas fa-trash me-1"></i> Logout
                    </a>
                    <form id="delete-dnc-form"  action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </div>
                </li>

            </ul>
        </div>

        <div class="sidebar" id="sidebar">
            <div class="sidebar-logo">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('admin/assets/img/logo.png') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="Route::is('admin.dashboard') ? 'active' : ''">
                            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-columns"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="{{ Route::is('admin.sanitize') ? 'active' : '' }}">
                            <a href="{{ route('admin.sanitize') }}"><i class="fab fa-buffer"></i><span>Scrub New File</span> </a>
                        </li>
                        <li class="{{ Route::is('sanitized') ? 'active' : '' }}">
                            <a href="{{ route('sanitized') }}"><i class="fas fa-layer-group"></i> <span>Scrubed Files</span></a>
                        </li>
                        <li class="{{ Route::is('admin.add.single') ? 'active' : '' }}">
                            <a href="{{ route('admin.add.single') }}"><i class="far fa-calendar-check"></i> <span> Real-Time Check
                            </span></a>
                        </li>
                        <li class="{{ Route::is('admin.lead') ? 'active' : '' }}">
                            <a href="{{ route('admin.lead') }}"><i class="far fa-calendar-check"></i> <span> Add New Leads
                            </span></a>
                        </li>
                        <li class="{{ Route::is('admin.dnc') ? 'active' : '' }}">
                            <a href="{{ route('admin.dnc') }}"><i class="fas fa-hashtag"></i> <span>Do Not Call (DNC)</span></a>
                        </li>
                        <li class="{{ Route::is('admin.user') ? 'active' : '' }}">
                            <a href="{{ route('admin.user') }}"><i class="fas fa-user"></i> <span>Users</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        @yield('content')
    </div>

    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/admin.js') }}"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>
