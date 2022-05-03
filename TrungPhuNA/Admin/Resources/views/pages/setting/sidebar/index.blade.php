@extends('admin::layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sidebar</h3>

                        <div class="box-tools">
                            <a href="{{ route('get_admin.sidebar.create') }}" class="btn btn-xs btn-primary">Thêm mới <i class="fa fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Menu</th>
                                <th>Icon</th>
                                <th>Sub Menu</th>
                                <th>Trang thái</th>
                                <th>Thao tác</th>
                            </tr>
                            @foreach($sidebars as $item)
                            <tr>
                                <td>
                                    <a href="">{{ $item->m_name }}</a>
                                </td>
                                <td><span class="{{ $item->m_icon }}"> {{ $item->m_icon }}</span></td>
                                <td>{{ $item->m_sub_flag ? "True" : "False" }}</td>
                                <td>
                                    @if( $item->m_status == 2)
                                        <span class="label label-success">Hiện</span>
                                    @else
                                        <span class="label label-default">Ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('get_admin.sidebar.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                                    <a href="{{ route('get_admin.sidebar.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
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
            <div class="col-xs-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Sắp xếp thư tự bằng cách kéo thả</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <ul id="sortable">
                            @foreach($sidebars as $item)
                                <li class="ui-state-default js-item-menu" data-id="{{ $item->id }}">
                                    <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{ $item->m_name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="box-footer text-center" style="width: 60%">
                            <a href="" class="js-update-sort-nav btn btn-xs btn-info" style="margin-left: 7px">Cập
                                nhật</a>
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
<script>
    var URL_UPDATE_SORT_NAV = '{{ route("get_admin.sidebar.update_sort") }}'
</script>

