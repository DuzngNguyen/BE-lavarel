@extends('admin::layouts.master')

@section('content')
    <div class="fix-top-submit">
        <a href="{{ route('get_admin.product.index') }}" class="btn btn-default"><i
                class="fa fa-arrow-left"></i> Huỷ bỏ</a>
        <div>
            <a class="btn btn-success js-submit-form"><i class="fa fa-save"></i> Lưu</a>
            <a href="{{ route('get_admin.product.create',['copy' => $product->id]) }}" class="btn btn-info "><i class="fa fa-copy"></i> Nhân bản</a>
        </div>
    </div>
    <section class="content-header">
        <h1>Cập nhật sản phẩm</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.ecommerce.product.form')
        </div>
    </section>
@endsection
