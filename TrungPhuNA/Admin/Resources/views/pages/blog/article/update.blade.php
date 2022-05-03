@extends('admin::layouts.master')

@section('content')
    <div class="fix-top-submit">
        <a href="{{ route('get_admin.article.index') }}" class="btn btn-default"><i
                class="fa fa-arrow-left"></i> Huỷ bỏ</a>
        <div>
            <a class="btn btn-success js-submit-form"><i class="fa fa-save"></i> Lưu</a>
            <a href="{{ route('get_admin.article.create',['copy' => $article->id]) }}" class="btn btn-info "><i class="fa fa-copy"></i> Nhân bản</a>
        </div>
    </div>
    <section class="content-header">
        <h1>Cập nhật bài viết</h1>
    </section>
    <section class="content">
        <div class="row">
            @include('admin::pages.blog.article.form')
        </div>
    </section>
@endsection
