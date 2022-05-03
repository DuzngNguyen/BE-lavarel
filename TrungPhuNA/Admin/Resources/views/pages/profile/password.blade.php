@extends('admin::layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profile {{ $admin->name }}
        </h1>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" style="width: 80px;height: 80px" src="{{ pare_url_file($admin->avatar) }}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $admin->name }}</h3>
                        <p class="text-muted text-center">{{ $admin->address }}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="{{ route('get_admin.profile.index') }}">Cập nhật thông tin</a></li>
                        <li class="active"><a href="{{ route('get_admin.profile.update_password') }}">Đổi mật khẩu</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                                  action="">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu mới">
                                        @if ($errors->first('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Xác nhận mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation"  placeholder="Xác nhận mật khẩu">
                                        @if ($errors->first('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
@endsection
