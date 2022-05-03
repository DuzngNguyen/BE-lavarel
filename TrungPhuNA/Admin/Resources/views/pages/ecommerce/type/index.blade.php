@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách loại sản phẩm</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.type.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên loại</th>
                                <th>Slug</th>
                                <th>Icon</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($types as $item)
                                <tr>
                                    <td>
                                        <a href="">{{ $item->pt_name }}</a>
                                    </td>
                                    <td>{{ $item->pt_slug }}</td>
                                    <td><i class="fa {{ $item->pt_icon }}"></i></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.type.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.type.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! $types->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
