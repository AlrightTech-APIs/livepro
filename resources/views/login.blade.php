<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Login landing page</title>
</head>

<body>
    <section class="side" style="background: url({{ asset('assets/images/bk.png') }}) no-repeat;">
        <img src="{{ asset('assets/images/img.svg') }}" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Welcome back</p>
            <div class="separator"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services
            </p>

            <form class="login-form" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-control">
                    <input type="text" name="email" placeholder="Email">
                    <i class="fas fa-user"></i>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color: #e74a3b !important;">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                    {{-- <span class="invalid-feedback" role="alert">
                        <strong style="color: #e74a3b !important;">{{ __("working") }}</strong>
                    </span> --}}
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: #e74a3b !important;">{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="btn_class">
                    <button class="submit" class="loginbtn">Login</button>
                </div>
            </form>
        </div>
    </section>

</body>

</html>
