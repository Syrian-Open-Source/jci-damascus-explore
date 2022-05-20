@extends('voyager::master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger w-75 mx-auto mt-5">
        <div class="font-medium text-red-600">
            {{ __('global.wrong_data') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('checkActivity')}}" method="POST">
<select name="activity_id" id="activity">
    @foreach($activities as $activity)
        <option value="{{$activity->id}}">{{$activity->name}}</option>
    @endforeach
</select>
<input name="user_id" id="user" hidden/>

<div id="qr-reader" style="width:500px"></div>
<div id="qr-reader-results"></div>
<button type="submit"> تحقق </button>
</form>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
var resultContainer = document.getElementById('qr-reader-results');
var lastResult, countResults = 0;

function onScanSuccess(decodedText, decodedResult) {
    if (decodedText !== lastResult) {
        ++countResults;
        lastResult = decodedText;
        // Handle on success condition with the decoded message.
        document.getElementById('user').value = decodedText;
        console.log(`Scan result ${decodedText}`, decodedResult);
    }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
</script>
@stop