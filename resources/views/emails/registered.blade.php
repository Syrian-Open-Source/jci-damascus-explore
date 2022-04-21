@component('mail::message')
    <center>{{trans('global.register_success')}}</center>

    {{trans('global.texts.register_email_body', [
    'cost' => $data->total_cost.  " " . trans("global.unit"),
    'user_name' => $data->fill_name_ar,
    ])}}

    {{trans('global.name')}} : {{$reporter['name']}}
    {{trans('global.phone')}} : {{$reporter['phone']}}

    {{trans('global.texts.register_email_footer')}}
@endcomponent
