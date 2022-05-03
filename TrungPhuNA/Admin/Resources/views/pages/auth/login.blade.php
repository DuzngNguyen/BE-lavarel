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
<div class="login-box">
    <div class="login-logo">
        <a href="/"><b>Admin</b>CMS</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Đăng nhập hệ thống</p>
        <form action="" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="account" placeholder="Email hoạc username">
                <span class="fa fa-envelope-o form-control-feedback"></span>
                @if ($errors->first('account'))
                    <span class="text-danger">{{ $errors->first('account') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="fa fa-key form-control-feedback"></span>
                @if ($errors->first('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
                </div>
                <!-- /.col -->
            </div>
            <a href="{{ route('get_admin.forget_password') }}" style="margin-top: 10px;display: block">Quên mật khẩu ?</a>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
