@extends('voyager::master')
@section('content')
@if($result)
<h1>يحق ل{{$user->fill_name_ar}} دخول هاد النشاط</h1>
@else
<h1>لا يحق ل{{$user->fill_name_ar}} دخول هاد النشاط</h1>
@endif
<a href="{{route('qrCode')}}">اعادة المسح</a>
@stop