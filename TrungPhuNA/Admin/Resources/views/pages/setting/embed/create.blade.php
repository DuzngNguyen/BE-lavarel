@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Thêm mới mã nhúng</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.setting.embed.form')
        </div>
    </section>
@endsection
