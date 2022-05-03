@extends('api::layouts.master')

@section('content')
    <h1>Hello Module Api</h1>

    <p>
        This view is loaded from module: {!! config('api.name') !!}
    </p>
@endsection
