<table class="table no-margin">
    <thead>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>SĐT</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><a href="#">{{ $user->id }}</a></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone }}</td>
    </tr>
    </tbody>
</table>
