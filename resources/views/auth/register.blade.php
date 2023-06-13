<!DOCTYPE html>
<html lang="en">
<!-- Head -->

<!-- Mirrored from offsetcode.com/themes/messenger/2.2.0/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 12:41:28 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no, viewport-fit=cover">
    <meta name="color-scheme" content="light dark">

    <title>Login</title>
    @include('web.layouts.css')
</head>

<body class="bg-light">

    <div class="container">
        <div class="row align-items-center justify-content-center min-vh-100 gx-0">

            <div class="col-12 col-md-5 col-lg-6">
                <div class="card card-shadow border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="device" class="device">
                            <div class="row g-6">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h3 class="fw-bold mb-2">Sign Up</h3>
                                        <p>Create your account</p>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="signin-name"
                                            value="{{ old('name') }}" placeholder="name">
                                        <label for="signin-name">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="signin-email"
                                            value="{{ old('email') }}" placeholder="Email">
                                        <label for="signin-email">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="signin-password" name="password" placeholder="Password">
                                        <label for="signin-password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" name="password" placeholder="Confirm Password">
                                        <label for="password_confirmation">Password</label>
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Sign
                                        Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Text -->
                <div class="text-center mt-8">
                    <p>Already have an account?<a href="{{ route('login') }}">LogIn</a></p>
                    {{-- <p><a href="password-reset.html">Forgot Password?</a></p> --}}
                </div>
            </div>
        </div> <!-- / .row -->
    </div>

    <!-- Scripts -->
    @include('web.layouts.scripts')
    <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBTS-VxV58VjlZKgQeJ6TKmdUYq2cKWBFE",
            authDomain: "laravel-notification-38e38.firebaseapp.com",
            databaseURL: "https://laravel-notification-38e38.firebaseio.com",
            projectId: "laravel-notification-38e38",
            storageBucket: "laravel-notification-38e38.appspot.com",
            messagingSenderId: "306945239752",
            appId: "1:306945239752:web:e6616143604a4219b1d3fd",
            measurementId: "G-X1BNGPRKV0"
        };
        // measurementId: G-R1KQTR3JBN
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function initFirebaseMessagingRegistration() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(token) {
                    console.log(token);
                    $('.device').val(token);
                }).catch(function(err) {
                    console.log('User Chat Token Error' + err);
                });
        }
    </script>

    <script>
        $(document).ready(function() {
            initFirebaseMessagingRegistration();
        });
    </script>
</body>

<!-- Mirrored from offsetcode.com/themes/messenger/2.2.0/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Jun 2023 12:41:28 GMT -->

</html>
