@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Cập nhật pages</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.setting.static.form')
        </div>
    </section>
@endsection
