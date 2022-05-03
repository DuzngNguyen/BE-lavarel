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
        <p class="login-box-msg">Đăng ký</p>
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="text" name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}">
                <span class="fa fa-user form-control-feedback"></span>
                @if ($errors->first('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="0986420994">
                <span class="fa fa-envelope-o form-control-feedback"></span>
                @if ($errors->first('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="fa fa-envelope-o form-control-feedback"></span>
                @if ($errors->first('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="fa fa-key form-control-feedback"></span>
                @if ($errors->first('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <span class="fa fa-key  form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
                </div>
                <!-- /.col -->
            </div>
            @include('user::auth.include.social')
            <a href="{{ route('user_get.login') }}" title="Đăng ký" rel="nofollow" class="text-center">Đăng nhập</a>
        </form>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</body>
</html>
