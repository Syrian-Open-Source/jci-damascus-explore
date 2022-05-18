@extends('layouts.main')

@section('content')
    <div class="container my-5">
        @include('layouts.sessions')
        <h1 class="f-red font-weight-bold">{{trans('global.closed_website_message')}}</h1>
        <p>{{trans('global.texts.closed_website_message')}}</p>
    </div>
@endsection
