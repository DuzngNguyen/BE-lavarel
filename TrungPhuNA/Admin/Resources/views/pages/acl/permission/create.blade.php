@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Thêm mới quyền</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.acl.permission.form')
        </div>
    </section>
@endsection
