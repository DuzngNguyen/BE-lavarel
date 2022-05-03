<table class="table table-hover">
    <tbody>
    <tr>
        <th>Name</th>
        <th>Url</th>
        <th>Sort</th>
        <th>Ngày tạo</th>
        <th>Thao tác</th>
    </tr>
    @foreach($navs as $item)
        <tr>
            <td>
                {{ $item->sn_name }}
            </td>
            <td>
                <a href="">{{ $item->sn_url }}</a>
            </td>
            <td>
                {{ $item->sn_sort }}
            </td>
            <td>{{ $item->created_at }}</td>
            <td>
                <a href="{{ route('get_admin.nav.update', $item->id) }}" class="btn btn-sm btn-info"> Cập nhật</a>
                <a href="{{ route('get_admin.nav.delete', $item->id) }}" class="btn btn-sm btn-danger"> Xoá</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
