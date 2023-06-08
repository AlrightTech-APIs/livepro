<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>LIVEPRO | @yield('title')</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="main-wrapper">

        <header class="header">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="javascript:void(0);">
                        <span class="bar-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </a>
                    <a href="index.html" class="navbar-brand logo">
                        <img src="{{ asset('admin/assets/img/logo.png') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="index.html" class="navbar-brand logo-small">
                        <img src="{{ asset('admin/assets/img/logo-icon.png') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="nav-item desc-list">
                        <a href="{{ route('user.add.sanitize') }}" class="nav-link header-login">
                            <i class="fas fa-plus-circle me-1"></i> <span>Scrub Data</span>
                        </a>
                    </li>

                    <li class="nav-item desc-list">
                        <a href="{{ route('user.sanitized') }}" class="nav-link header-login">
                            <i class="fas fa-layer-circle me-1"></i> <span>Sanitized Data</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown has-arrow logged-item">
                        <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="user-img">
                                <img class="rounded-circle" src="{{ asset('assets/img/provider/provider-01.jpg') }}" alt="" width="31">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="user-header">
                                <div class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" src="{{ asset('assets/img/provider/provider-01.jpg') }}"
                                        alt="">
                                </div>
                                <div class="user-text">
                                    <h6 class="text-truncate">{{ auth()->user()->name }}</h6>
                                </div>
                            </div>
                            {{-- <a class="dropdown-item" href="index.html">Logout</a> --}}
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
            </nav>
        </header>

        @yield('content')

        <footer class="footer">

            {{-- <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">

                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Quick Links </h2>
                                <ul>
                                    <li>
                                        <a href="about-us.html">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">Faq</a>
                                    </li>
                                    <li>
                                        <a href="#">Help</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6">

                            <div class="footer-widget footer-menu">
                                <h2 class="footer-title">Categories</h2>
                                <ul>
                                    <li>
                                        <a href="search.html">Computer</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Interior</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Car Wash</a>
                                    </li>
                                    <li>
                                        <a href="search.html">Cleaning</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6">

                            <div class="footer-widget footer-contact">
                                <h2 class="footer-title">Contact Us</h2>
                                <div class="footer-contact-info">
                                    <div class="footer-address">
                                        <span><i class="far fa-building"></i></span>
                                        <p>367 Hillcrest Lane, Irvine, California, United States</p>
                                    </div>
                                    <p><i class="fas fa-headphones"></i> 321 546 8764</p>
                                    <p class="mb-0"><i class="fas fa-envelope"></i> <a
                                            href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="9febedeafaf3e6ecfaf3f3dffae7fef2eff3fab1fcf0f2">[email&#160;protected]</a>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6">

                            <div class="footer-widget">
                                <h2 class="footer-title">Follow Us</h2>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" target="_blank"><i class="fab fa-google"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="subscribe-form">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <button type="submit" class="btn footer-btn">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}


            <div class="footer-bottom">
                <div class="container">

                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="copyright-text">
                                    <p class="mb-0">&copy; 2022 <a href="index.html">Truelysell</a>. All rights
                                        reserved.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">

                                <div class="copyright-menu">
                                    <ul class="policy-menu">
                                        <li>
                                            <a href="term-condition.html">Terms and Conditions</a>
                                        </li>
                                        <li>
                                            <a href="privacy-policy.html">Privacy</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </footer>

    </div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>