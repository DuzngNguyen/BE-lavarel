@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Cập nhật nhóm quyền</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.acl.role.form')
        </div>
    </section>
@endsection
