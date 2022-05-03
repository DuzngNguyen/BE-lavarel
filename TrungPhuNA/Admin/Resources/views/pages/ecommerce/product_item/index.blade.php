@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách Item sản phẩm</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.product_item.create') }}" class="btn btn-xs btn-primary">Thêm mới <i
                                    class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 100px">Hình ảnh</th>
                                <th>Tên</th>
                                <th style="width: 50%">Product</th>
                                <th style="width: 100px">Thứ tự</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($products as $item)
                                <tr>
                                    <td>
                                        <a href="" class="a-img-thumbnail">
                                            <img src="{{ pare_url_file($item->pi_avatar) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->pi_name }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a>
                                    </td>
                                    <td>{{ $item->pi_sort }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.product_item.update', $item->id) }}"
                                           class="btn btn-xs btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.product_item.delete', $item->id) }}"
                                           class="btn btn-xs btn-danger"> Xoá</a>
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
