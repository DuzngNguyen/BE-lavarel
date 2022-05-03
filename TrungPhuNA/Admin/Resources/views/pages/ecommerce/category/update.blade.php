@extends('admin::layouts.master')

@section('content')
    <div class="fix-top-submit">
        <a href="{{ route('get_admin.category.index') }}" class="btn btn-default"><i
                class="fa fa-arrow-left"></i> Huỷ bỏ</a>
        <a class="btn btn-success js-submit-form"><i class="fa fa-save"></i> Lưu</a>
    </div>
    <section class="content-header">
        <h1>Cập nhật danh mục</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.ecommerce.category.form')
        </div>
    </section>
@endsection
