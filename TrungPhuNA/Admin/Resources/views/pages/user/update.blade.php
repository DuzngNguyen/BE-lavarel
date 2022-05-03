@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Thêm mới cập nhật</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.user.form')
        </div>
    </section>
@endsection
