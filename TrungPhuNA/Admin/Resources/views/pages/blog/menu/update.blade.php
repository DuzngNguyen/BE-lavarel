@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Cập nhật menu bài viết</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.blog.menu.form')
        </div>
    </section>
@endsection
