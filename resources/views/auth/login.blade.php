<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from mannatthemes.com/zoter/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Feb 2019 19:10:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Zoter - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Mannatthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.ico">
    <link href="{{asset('/')}}admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('/')}}admin/assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <a href="index.html" class="logo logo-admin"><img src="{{asset('/')}}front/images/hotel/logo.png" height="20" alt="logo"></a>
            </div>
            <div class="px-3 pb-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            {{--<input class="form-control" type="text" required="" placeholder="Username">--}}
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            {{--<input class="form-control" type="password" required="" placeholder="Password">--}}
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                {{--<input type="checkbox" class="custom-control-input" id="customCheck1">--}}
                                {{--<label class="custom-control-label" for="customCheck1">Remember me</label>--}}
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    {{--<div class="form-group m-t-10 mb-0 row">--}}
                        {{--<div class="col-sm-7 m-t-20"><a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a></div>--}}
                        {{--<div class="col-sm-5 m-t-20"><a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a></div>--}}
                    {{--</div>--}}
                </form>
            </div>
        </div>
    </div>
</div>
<!-- jQuery  -->
<script src="{{asset('/')}}admin/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/popper.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}admin/assets/js/modernizr.min.js"></script>
<script src="{{asset('/')}}admin//assets/js/detect.js"></script>
<script src="{{asset('/')}}admin/assets/js/fastclick.js"></script>
<script src="{{asset('/')}}admin/assets/js/jquery.blockUI.js"></script>
<script src="{{asset('/')}}admin/assets/js/waves.js"></script>
<script src="{{asset('/')}}admin/assets/js/jquery.nicescroll.js"></script>
<!-- App js -->
<script src="{{asset('/')}}admin/assets/js/app.js"></script>
</body>
<!-- Mirrored from mannatthemes.com/zoter/vertical/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 14 Feb 2019 19:10:55 GMT -->

</html>