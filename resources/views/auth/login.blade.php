<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ananda Dimmas Login</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180"
                                        alt="">
                                </a>
                                {{-- <p class="text-center">Your Social Campaigns</p> --}}
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" placeholder="Email" class="form-control"
                                            id="">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" placeholder="Password"
                                                class="form-control" id="passwordInput">
                                            <span class="input-group-text" id="togglePassword">
                                                <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                                        value="Sign In">
                                    {{-- <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                        <a class="text-primary fw-bold ms-2"
                                            href="./authentication-register.html">Create an account</a>
                                    </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#togglePassword").click(function() {
                var passwordInput = $("#passwordInput");
                var toggleIcon = $("#toggleIcon");

                // Toggle the password visibility
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    toggleIcon.removeClass("bi-eye-slash").addClass("bi-eye");
                } else {
                    passwordInput.attr("type", "password");
                    toggleIcon.removeClass("bi-eye").addClass("bi-eye-slash");
                }
            });
        });
    </script>
</body>

</html>
