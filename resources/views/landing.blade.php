<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/d92630495d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('assets/css/ladingpage.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
</head>
<body>


<div class="maincontent">
    <div>
    </div>
    <img src="{{ asset('assets/images/bk.png') }}" alt="" class="homebanner_img">

    <div class="container">
        <img class="logo"
            src="https://github.com/malunaridev/Landing-Pages-Are-Fun/blob/master/2-business-agency-concept-2/assets/logo.png?raw=true">
        <div class=" login_content">
            <div id="content-text">

                <h1 class="Home_head1"><span>Login</span><br><u> Awsome </u> site</h1>
                <h2 class="Home_head2">Lorem ipsum dolor sit amet, consectetur <br>
                    adipisicing elit pariatur quibusdam <br>
                    voluptatem pariatur dolore.</h2>
                <a href="{{ route('login') }}"><button class="button_login">Login</button></a>

            </div>
        </div>
    </div>
</div>

 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>
 