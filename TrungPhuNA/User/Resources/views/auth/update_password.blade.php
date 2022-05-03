<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cập nhật mật khẩu mới | CMS</title>
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
        <p class="login-box-msg">Cập nhật mật khẩu mới với tài khoản <b>{{ $user->name }}</b></p>
        <form action="" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới">
                <span class="fa fa-key form-control-feedback"></span>
                @if ($errors->first('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu">
                <span class="fa fa-key  form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Cập nhật mật khẩu</button>
                </div>
                <!-- /.col -->
            </div>

            <a href="{{ route('user_get.login') }}" style="margin-top: 10px;display:block" title="Đăng ký" rel="nofollow" class="text-center">Đăng nhập</a>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
