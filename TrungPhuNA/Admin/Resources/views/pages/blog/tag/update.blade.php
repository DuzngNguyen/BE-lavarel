@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Cập nhật tag</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.blog.tag.form')
        </div>
    </section>
@endsection
