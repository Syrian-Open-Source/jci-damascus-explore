@extends('layouts.main')

@section('content')
    <div class="container my-5">
        @include('layouts.sessions')
        <h1 class="f-red font-weight-bold">{{trans('global.welcome_message')}}</h1>
        <p>{{trans('global.texts.introduction')}}</p>
        <div class="d-inline-flex justify-content-center align-items-center">
            <div class="activity">1</div>
            <div >{{trans('global.texts.activity1')}}</div>
        </div>

        <div class="d-inline-flex justify-content-center align-items-center">
            <div class="activity">2</div>
            <div >{{trans('global.texts.activity2')}}</div>
        </div>

        <div class="d-inline-flex justify-content-center align-items-center">
            <div class="activity">3</div>
            <div >{{trans('global.texts.activity3')}}</div>
        </div>

        <a href="{{route('register.index')}}" class="btn btn-outline-danger w-100">{{trans('global.register')}}</a>
    </div>
@endsection
