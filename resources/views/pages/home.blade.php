@extends('layouts.main')

@section('content')
    <div class="container">
        <form class="mx-auto mt-5 w-75">
            <div class="form-group">
                <label>{{trans('global.fill_name_ar')}}</label>
                <input max="50" name="fill_name_ar" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.fill_name_en')}}</label>
                <input required name="fill_name_en" max="50" class="form-control">
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.birth_date')}}</label>
                    <input type="date" name="birth_date" max="50" class="form-control">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.sex')}}</label>
                    <select name="sex" class="form-select">
                        <option value="0">{{trans('global.male')}}</option>
                        <option value="1">{{trans('global.female')}}</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>{{trans('global.phone')}}</label>
                <input required name="phone" max="10" type="number" class="form-control">
            </div>
            <div class="form-group">
                <label>{{trans('global.whatsapp')}}</label>
                <input required name="whatsapp" max="50" class="form-control">
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.photo')}}</label>
                    <input type="file" name="photo" max="50" class="form-control">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.id_photo')}}</label>
                    <input type="file" name="id_photo" max="50" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>{{trans('global.fav_quote')}}</label>
                <input required name="fav_quote" max="50" class="form-control">
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.city')}}</label>
                    <select required name="city" class="form-select">
                        <option value="0">Damascus</option>
                        <option value="1">Aleppo</option>
                        <option value="2">Homs</option>
                        <option value="3">Tartus</option>
                        <option value="4">Latakia</option>
                        <option value="5">Suwayda</option>
                        <option value="6">Wadi</option>
                        <option value="7">Ugarit</option>
                        <option value="8">Baniyas</option>
                    </select>
                </div>

                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.position')}}</label>
                    <select required name="position" class="form-select">
                        <option value="0">Member</option>
                        <option value="1">Board Member</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>{{trans('global.food_allergy')}}</label>
                <input required name="food_allergy" max="50" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.illnesses')}}</label>
                <input required name="illnesses" max="50" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.hotel')}}</label>
                <select required name="city" class="form-select hotel">
                    <option value="1" class="hotel-item" data-price="100">Hotel 1</option>
                    <option value="1" class="hotel-item" data-price="100">Hotel 2</option>
                    <option value="1" class="hotel-item" data-price="100">Hotel 3</option>
                </select>
            </div>
            <hr>

            <p>{{trans('global.activities')}}</p>

            <div class="form-check">
                <input class="form-check-input activity-item" data-price="200" type="checkbox" value="1" id="activity1">
                <label class="form-check-label" for="activity1">
                    Ac1
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input activity-item" data-price="200" name="activity[2]" type="checkbox" value="2" id="activity2">
                <label class="form-check-label" for="activity2">
                    Ac2
                </label>
            </div>
            <h3 class="total-price mt-5">{{trans('global.total_cost')}}: </h3>
            <button type="submit" class="btn btn-primary mt-2 w-100">{{trans('global.submit')}}</button>
        </form>
    </div>
@endsection

@push('custom-scripts')

    <script>
        $('.activity-item').click(function () {
            recalculatePrice();
        });

        $('.hotel').change(function () {
            recalculatePrice();
        });

        function recalculatePrice() {
            let total = 0;
            $('.hotel-item').each((index, item) => {
                if(item.selected){
                    total += parseInt(item.dataset.price);
                }
            });
            $('.activity-item').each((index, item) => {
                if(item.checked){
                    total += parseInt(item.dataset.price);
                }
            });

            $('.total-price').html("{{trans('global.total_cost')}}:" + total)
        }
    </script>
@endpush
