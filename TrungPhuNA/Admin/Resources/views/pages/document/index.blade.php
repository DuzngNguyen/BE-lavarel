@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách liên hệ</h3>
                        <div class="box-tools">
                            <a href="{{ route('get_admin.document.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <div class="box-header">
                        <div class="box-title">
                            <form class="form-inline" method="GET"  autocomplete="off" enctype="multipart/form-data">
                                <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="name">
                                <select name="cate_id" class="form-control js-select2">
                                    <option value="">__ Chọn dữ liệu __</option>
                                    @foreach($categories as $item)
                                        <option value="{{ $item->id }}" {{ Request::get('cate_id') == $item->id ? "selected" : "" }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Lọc</button>
                            </form>
                        </div>
                        <div class="box-content js-hide action-transaction hide js-action-transaction">
                            <label class="label-checkbox" style="position: relative">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false">
                                    <input type="checkbox" name="ids[]"  value="" class="flat-red">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                            </label>
                            <span style="padding: 0 5px">đã chọn <b class="js-total-transaction"></b> đơn hàng trên trang </span>
                            <div class="btn-group" style="display: flex">
                                <button type="button" class="btn btn-default btn-flat">Chọn thao tác</button>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="js-delete-transactions">Xoá đơn</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="pull-left">
                                    &nbsp; Hiển thị: {{ $documents->firstItem() }} to {{ $documents->lastItem() }} /
                                    Tổng {{ $documents->total() }} record &nbsp;
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Preview</th>
                                <th>Created</th>
                                <th>#</th>
                            </tr>
                            @foreach($documents ?? [] as $item)
                                <tr>
                                    <td>
                                        <a href="#">{{ $item->name }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ Request()->fullUrlWithQuery([ 'cate_id' =>  $item->category_id ]) }}">{{ $item->category->name ?? "[N\A]" }}</a>
                                    </td>
                                    <td>{{ number_format($item->price,0,',','.') }} đ</td>
                                    <td>
                                        @if ($item->preview_url)
                                            <a href="{{ $item->preview_url }}" target="_blank">Click</a>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get_admin.document.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                        <a href="{{ route('get_admin.document.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box-footer">
                    {!! $documents->appends($query ?? [])->links('vendor.pagination.default') !!}
                </div>

                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
