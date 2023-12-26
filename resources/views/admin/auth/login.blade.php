<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
        <meta name="description" content="" />
        
        <!-- Global stylesheets -->
        <link href="{{ asset('assets/fonts/inter/inter.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/icons/phosphor/styles.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/all.min.css') }}" id="stylesheet" rel="stylesheet" type="text/css">

        <!-- Core JS files -->
        <script src="{{ asset('assets/demo/demo_configurator.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <!-- Theme JS files -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/demo/pages/form_validation_styles.js') }}"></script>
    </head>
    <body class="bg-dark">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content-inner">
                    <div class="content d-flex justify-content-center align-items-center">
                        <form class="login-form needs-validation" method="POST" action="{{ route('admin.login') }}" novalidate>
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                            <img src="{{ asset('assets/images/logo/sakoon125tran.png') }}" alt="">
                                        </div>
                                        <h5 class="mb-0">Login to your account</h5>
                                        <span class="d-block text-muted">Enter your credentials below</span>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger border-0 alert-dismissible fade show">
                                            @foreach ($errors->all() as $error)
                                            <span class="fw-semibold">Oh snap!</span> {{ $error }}
                                            @endforeach
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="email" name="email" class="form-control" placeholder="john@doe.com" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="password" name="password" class="form-control" placeholder="•••••••••••" required>
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-3">
                                        <label class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" checked>
                                            <span class="form-check-label">Remember</span>
                                        </label>
                                        <a href="#" class="ms-auto">Forgot password?</a>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>