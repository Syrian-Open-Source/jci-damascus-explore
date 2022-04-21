@extends('layouts.main')

@section('content')
    <div class="container">
        @include('layouts.sessions')
        <form class="mx-auto form mt-5 w-75" method="POST" action="{{route('register.store')}}"
              enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>{{trans('global.fill_name_ar')}}</label>
                <input maxlength="50" name="fill_name_ar" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.fill_name_en')}}</label>
                <input required name="fill_name_en" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.email')}}</label>
                <input required name="email" maxlength="50" class="form-control" type="email">
            </div>

            <div class="form-group">
                <label>{{trans('global.password')}}</label>
                <input required name="password" maxlength="50" class="form-control" type="password">
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.birth_date')}}</label>
                    <input type="date" name="birth_date" maxlength="50" class="form-control">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.gender')}}</label>
                    <select name="gender" class="form-select">
                        <option value="0">{{trans('global.male')}}</option>
                        <option value="1">{{trans('global.female')}}</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.mobile')}}</label>
                    <input required name="mobile" maxlength="10" minlength="10" type="number" class="form-control">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.whatsapp')}}</label>
                    <input required name="whatsapp" maxlength="50" type="number" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>{{trans('global.fav_quote')}}</label>
                <input required name="quote" maxlength="50" class="form-control">
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.image')}}</label>
                    <input type="file" name="image" maxlength="50" class="form-control" required>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.id_image')}}</label>
                    <input type="file" name="id_image" maxlength="50" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 col-sm-12">
                    <label>{{trans('global.residence')}}</label>
                    <select required name="local_room" class="form-select local-room">
                        <option value=""></option>
                        @foreach(\App\Models\User::getLocalRooms() as $key => $room)
                            <option value="{{$key}}">{{$room}}</option>
                        @endforeach
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
                <input name="food_allergy" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.illnesses')}}</label>
                <input name="illnesses" maxlength="50" class="form-control">
            </div>

            <div class="form-group">
                <label>{{trans('global.hotel')}}</label>
                <select name="hotel_id" class="form-select hotel">
                    <option value=""></option>
                    @foreach($hotels as $hotel)
                        <option value="{{$hotel->id}}" class="hotel-item"
                                data-price="{{$hotel->price}}">{{$hotel->name}}
                            - {{trans('global.cost_for_person')}} {{trans('global.unit')}}
                            : {{$hotel->price}}</option>
                    @endforeach
                </select>
                <p class="hotel-note text-danger hidden">{{trans('global.hotel-notes')}}</p>
            </div>
            <p class="text-success">{{trans('global.texts.hotel_notes')}}</p>
            <hr>
            <p>{{trans('global.activities')}}</p>
            @foreach($activities as $index => $activity)
                <div class="form-check">
                    <input class="form-check-input activity-item" name="activities[]" data-price="{{$activity->price}}"
                           type="checkbox" value="{{$activity->id}}" id="{{$activity->id}}">
                    <label class="form-check-label" for="{{$activity->id}}">
                        {{$activity->name}} - {{trans('global.cost_for_person')}}
                        : {{$activity->price}} {{trans('global.unit')}}
                    </label>
                </div>
            @endforeach
            <h3 class="total-price mt-5">{{trans('global.total_cost')}}: </h3>
            <button type="submit" class="btn btn-outline-danger mt-2 w-100">{{trans('global.submit')}}</button>
        </form>
    </div>
@endsection

@push('custom-scripts')

    <script>
        recalculatePrice();

        $('.local-room').change(function () {
            if ($(this).val() == 0) {
                $('.hotel').attr('disabled', true);
                $('.hotel').val(null);
                $('.hotel-note').removeClass('hidden');
            } else {
                $('.hotel').attr('disabled', false);
                $('.hotel-note').addClass('hidden');
            }
        });

        $('.activity-item').click(function () {
            recalculatePrice();
        });

        $('.hotel').change(function () {
            recalculatePrice();
        });

        function recalculatePrice() {
            let total = 0;

            $('.hotel-item').each((index, item) => {
                if (item.selected) {
                    total += parseFloat(item.dataset.price);
                }
            });
            $('.activity-item').each((index, item) => {
                if (item.checked) {
                    total += parseFloat(item.dataset.price);
                }
            });
            $('.total-price').html("{{trans('global.total_cost')}}: " + `<b>${total}</b>` + " {{trans('global.unit')}}")
        }
    </script>
@endpush
