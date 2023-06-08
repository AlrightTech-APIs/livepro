<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Truelysell | Template</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/admin.css') }}">
</head>

<body>
    <div class="main-wrapper">
        <div class="login-page" id="tsparticles">
            <div class="login-body container">
                <div class="loginbox" style="border: 5px solid #a67a3d;">
                    <div class="login-right-wrap">
                        <div class="account-header">
                            <div class="account-logo text-center mb-4">
                                <a href="#">
                                    <img src="{{ asset('admin/assets/img/logo.png') }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                        <div class="login-header">
                            <h3>Login <span>LIVE PRO</span></h3>
                            <p class="text-muted">Access to our Scrubber Tool</p>
                        </div>
                        <form class="login-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Enter your email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>
                            <div class="form-group mb-4">
                                <label class="control-label">Password</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    <!-- first include tsParticles engine -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles-engine"></script>

<!-- then include any tsParticles plugin needed -->
<script src="https://cdn.jsdelivr.net/npm/tsparticles/tsparticles.bundle.min.js"></script>

<!-- then include jquery wrapper -->
<script src="https://cdn.jsdelivr.net/npm/jquery-particles"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/admin.js') }}"></script>
    <script>
        // this loads the tsparticles package bundle, it's the easiest method for getting everything ready
// starting from v2 you can add only the features you need reducing the bundle size
$(document).ready(async function () {
    await loadFull(tsParticles);

    $("#tsparticles")
        .particles()
        .init(
            {
                background: {
                    color: {
                        value: "#0d47a1",
                    },
                },
                fpsLimit: 120,
                interactivity: {
                    events: {
                        onClick: {
                            enable: true,
                            mode: "push",
                        },
                        onHover: {
                            enable: true,
                            mode: "repulse",
                        },
                        resize: true,
                    },
                    modes: {
                        push: {
                            quantity: 4,
                        },
                        repulse: {
                            distance: 200,
                            duration: 0.4,
                        },
                    },
                },
                particles: {
                    color: {
                        value: "#ffffff",
                    },
                    links: {
                        color: "#ffffff",
                        distance: 150,
                        enable: true,
                        opacity: 0.5,
                        width: 1,
                    },
                    collisions: {
                        enable: true,
                    },
                    move: {
                        direction: "none",
                        enable: true,
                        outModes: {
                            default: "bounce",
                        },
                        random: false,
                        speed: 6,
                        straight: false,
                    },
                    number: {
                        density: {
                            enable: true,
                            area: 800,
                        },
                        value: 80,
                    },
                    opacity: {
                        value: 0.5,
                    },
                    shape: {
                        type: "circle",
                    },
                    size: {
                        value: { min: 1, max: 5 },
                    },
                },
                detectRetina: true,
            },
            function (container) {
                // container is the particles container where you can play/pause or stop/start.
                // the container is already started, you don't need to start it manually.
            }
        );

    // or

    $("#tsparticles")
        .particles()
        .ajax("assets/particles.json", function (container) {
            // container is the particles container where you can play/pause or stop/start.
            // the container is already started, you don't need to start it manually.
        });
});
    </script>
</body>

</html>