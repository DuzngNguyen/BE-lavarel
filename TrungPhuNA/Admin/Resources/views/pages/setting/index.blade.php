@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cấu hình</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.general.index') }}" class="js-setting-general">
                                        <span class="info-box-icon">
                                            <i class="fa fa-wrench"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Cấu hình chung</span>
                                        <span class="info-box-description">Thông tin website</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </a>
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.account.index') }}">
                                        <span class="info-box-icon">
                                            <i class="fa fa-user-circle"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Tài khoản</span>
                                        <span class="info-box-description">Quản lý tài khoản, nhóm tài khoản và phân quyền</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix visible-sm-block"></div>

                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.role.index') }}">
                                    <span class="info-box-icon"><i class="fa fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Nhóm tài khoản</span>
                                        <span class="info-box-description">Quản lý nhóm quyền tài khoản</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="">
                                        <span class="info-box-icon">
                                            <i class="fa fa-bell-o"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Thông báo</span>
                                        <span class="info-box-description">Quản lý thông báo</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.setting.email') }}" class="js-render-email">
                                        <span class="info-box-icon">
                                            <i class="fa fa-envelope-o"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Email</span>
                                        <span class="info-box-description">Cấu hình tài khoản gửi email</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.slide.index') }}">
                                        <span class="info-box-icon">
                                            <i class="fa fa-picture-o"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Slide</span>
                                        <span class="info-box-description">Slide giới thiệu trang chủ</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.page.index') }}">
                                        <span class="info-box-icon">
                                            <i class="fa fa-paper-plane-o"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Trang tĩnh</span>
                                        <span class="info-box-description">Nội dung các trang tĩnh</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.nav.index') }}">
                                        <span class="info-box-icon">
                                            <i class="fa fa-bars"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Menu</span>
                                        <span class="info-box-description">Link menu website</span>
                                    </div>
                                </a>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <a href="{{ route('get_admin.embed.index') }}">
                                        <span class="info-box-icon">
                                            <i class="fa fa-code"></i>
                                        </span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Mã nhúng</span>
                                        <span class="info-box-description">Google analytics, console ...</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
