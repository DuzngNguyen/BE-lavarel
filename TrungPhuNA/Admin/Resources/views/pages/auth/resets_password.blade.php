<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Nhập mật khẩu mới | CMS</title>
    <link rel="stylesheet" href="{{ asset('css/init_admin.css') }}">
    <meta name="robots" content="noindex, nofollow">
</head>
<body class="hold-transition login-page">
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="/"><b>Admin</b>CMS</a>
    </div>
    <!-- User name -->

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="{{ asset('/images/preloader.png') }}" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="" method="POST">
            @csrf
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="password">

                <div class="input-group-btn">
                    <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        Nhập mật khẩu của bạn để đăng nhập hệ thống
    </div>
    <div class="text-center">
        <a href="{{ route('get_admin.login') }}">Login</a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright © 2022-2022 <b><a href="" class="text-black">TrungPhuNA</a></b>
    </div>
</div>
</body>
</html>
