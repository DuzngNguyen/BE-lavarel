@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('get_admin.account.create') }}" class="btn btn-primary btn-block margin-bottom">Thêm mới</a>
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mục</h3>
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="{{ route('get_admin.account.index') }}"><i class="fa fa-inbox"></i> Tài khoản </a>
                            </li>
                            <li><a href="{{ route('get_admin.role.index') }}"><i class="fa fa-file-text-o"></i> Nhóm quyền </a></li>
                            <li><a href="{{ route('get_admin.permission.index') }}"><i class="fa fa-key"></i> Quyền </a></li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-10">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                <tr>
                                    <th style="width: 100px">Hình ảnh</th>
                                    <th>Họ tên</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                                @foreach($admins as $item)
                                    <tr>
                                        <td class="mailbox-star">
                                            <a href="" class="a-img-thumbnail">
                                                <img src="{{ pare_url_file($item->avatar) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="mailbox-name">{{ $item->name }}</td>
                                        <td class="mailbox-name">{{ $item->account }}</td>
                                        <td class="mailbox-name">{{ $item->email }}</td>
                                        <td class="mailbox-name">{{ $item->phone }}</td>
                                        <td class="mailbox-name">{{ $item->created_at }}</td>
                                        <td class="mailbox-date">
                                            <a href="{{ route('get_admin.account.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                            <a href="{{ route('get_admin.account.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
@endsection
