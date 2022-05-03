@extends('admin::layouts.master')

@section('content')
    <section class="content-header">
        <h1>Thêm mới nav</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.setting.nav.form')
        </div>
    </section>
@endsection
