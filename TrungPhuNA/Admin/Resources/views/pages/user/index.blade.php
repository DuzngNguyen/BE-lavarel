@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách thành viên</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.user.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 100px">Hình ảnh</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Level</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($users as $item)
                                <tr>
                                    <td>
                                        <a href="" class="a-img-thumbnail">
                                            <img src="{{ pare_url_file($item->avatar) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">{{ $item->name }}</a>
                                    </td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->level === 1)
                                            <span class="label label-danger">Admin</span>
                                        @elseif($item->level === 2)
                                            <span class="label label-success">Khách</span>
                                        @else
                                            <span class="label label-default">Mới</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.user.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.user.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
