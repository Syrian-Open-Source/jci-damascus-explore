@extends('layouts.main')

@section('content')
<div class="container">
    <form class="mx-auto mt-5 w-50">
        <div class="form-group">
            <label >{{trans('global.fill_name_ar')}}</label>
            <input max="50" name="fill_name_ar" class="form-control" >
        </div>

        <div class="form-group">
            <label>{{trans('global.fill_name_en')}}</label>
            <input name="fill_name_en" max="50" class="form-control" >
        </div>

        <div class="form-group">
            <label >{{trans('global.birth_date')}}</label>
            <input name="birth_date" max="50" class="form-control" >
        </div>
        <div class="form-group">
            <label >{{trans('global.sex')}}</label>
            <select name="sex" class="form-control">
                <option value="{{trans('global.male')}}">{{trans('global.male')}}</option>
                <option value="{{trans('global.female')}}">{{trans('global.female')}}</option>
            </select>
        </div>

        <div class="form-group">
            <label >{{trans('global.phone')}}</label>
            <input name="phone" max="50" class="form-control" >
        </div>
        <div class="form-group">
            <label >{{trans('global.whatsapp')}}</label>
            <input name="whatsapp" max="50" class="form-control" >
        </div>
        <div class="form-group">
            <label >{{trans('global.photo')}}</label>
            <input type="file" name="photo" max="50" class="form-control" >
        </div>
        <div class="form-group">
            <label >{{trans('global.id_photo')}}</label>
            <input type="file" name="id_photo" max="50" class="form-control" >
        </div>
        <div class="form-group">
            <label >{{trans('global.fav_quote')}}</label>
            <input  name="fav_quote" max="50" class="form-control" >
        </div>

        <div class="form-group">
            <label >{{trans('global.city')}}</label>
            <select name="city" class="form-control">
                <option value="1">Damascus</option>
                <option value="2">Aleppo</option>
                <option value="3">Homs</option>
                <option value="4">Latakia</option>
                <option value="5">Suwayda</option>
                <option value="6">Wadi</option>
                <option value="7">Ugarit</option>
            </select>
        </div>

        <div class="form-group">
            <label >{{trans('global.position')}}</label>
            <select name="position" class="form-control">
                <option value="0">Member</option>
                <option value="1">Board Member</option>
            </select>
        </div>

        <div class="form-group">
            <label >{{trans('global.food_allergy')}}</label>
            <input  name="food_allergy" max="50" class="form-control" >
        </div>

        <div class="form-group">
            <label >{{trans('global.illnesses')}}</label>
            <input  name="illnesses" max="50" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
</div>
@endsection
