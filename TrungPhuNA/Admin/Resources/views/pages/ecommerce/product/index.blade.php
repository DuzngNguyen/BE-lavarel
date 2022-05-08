@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sản phẩm</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.product.create') }}" class="btn btn-xs btn-primary">Thêm mới <i
                                    class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline">
                                <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Name ...">
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 100px">Hình ảnh</th>
                                <th style="width: 40%">Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($products as $item)
                                <tr>
                                    <td>
                                        <a href="" class="a-img-thumbnail">
                                            <img src="{{ pare_url_file($item->pro_avatar) }}" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">{{ $item->pro_name }}</a> <br>
                                        <p style="margin-bottom: 0">Số lượng <b class="text-primary">{{ $item->pro_number }}</b></p>
                                        <p style="margin-bottom: 0">Giá <b class="text-danger">{{ number_format($item->pro_price,0,',','.') }} Vnđ</b></p>
                                    </td>
                                    <td>
                                        @if(isset($item->categories) && !$item->categories->isEmpty())
                                            <p class="list-categories">
                                                @foreach($item->categories as $cate)
                                                    <a href="{{ $request->fullUrlWithQuery(['c' => $cate->id]) }}">{{ $cate->c_name }}</a>
                                                @endforeach
                                            </p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('get_admin.product.update', $item->id) }}"
                                           class="btn btn-xs btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.product.delete', $item->id) }}"
                                           class="btn btn-xs btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        {!! $products->links('vendor.pagination.default',['query' => $query ?? []]) !!}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
