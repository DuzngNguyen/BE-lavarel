@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Cập nhật slide</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.setting.slide.form')
        </div>
    </section>
@endsection
