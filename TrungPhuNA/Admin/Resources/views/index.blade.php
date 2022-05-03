@extends('admin::layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Xin chào {{ get_data_user('admins','name') }}
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <p>Cùng nhau xây dựng và phát triển hệ thống, mang lại doanh thu khủng</p>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
