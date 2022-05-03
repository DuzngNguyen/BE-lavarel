<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | CMS</title>
    <link rel="stylesheet" href="{{ asset('css/init_admin.css') }}">
    <meta name="robots" content="noindex, nofollow">
</head>
<body class="hold-transition login-page">
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="/"><b>Admin</b>LTE</a>
    </div>
    <!-- START LOCK SCREEN ITEM -->
    @if(Session::has('error'))
        <p class="text-center text-danger">{{ Session::get('error') }}</p>
    @endif
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="/images/preloader.png" alt="Quên mật khẩu">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->

        <form class="lockscreen-credentials" action="" method="POST">
            @csrf
            <div class="input-group">
                <input type="email" class="form-control" required name="email" value="{{ old('email') }}" placeholder="Email quên mật khẩu">
                <div class="input-group-btn">
                    <button type="submit" class="btn" ><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Enter your password to retrieve your session
    </div>
    <div class="text-center">
        <a href="{{ route('user_get.login') }}" title="Đăng nhập">Or sign in as a different user</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2014-2016 <b><a href="https://adminlte.io" class="text-black">Almsaeed Studio</a></b><br>
        All rights reserved
    </div>
</div>
</body>
</html>
