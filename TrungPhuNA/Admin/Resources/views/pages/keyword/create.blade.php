@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Thêm mới từ khoá</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.keyword.form')
        </div>
    </section>
@endsection
