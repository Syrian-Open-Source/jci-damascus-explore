@extends('voyager::master')
@section('content')
    <style>
        .qr-form {
            height: 500px;
            padding: 40px;
            width: 500px;
            margin: auto;
        }

        #qr-reader {
            width: 100%;
            height: 100%;
        }

        .qr-form .activity {
            width: 100%;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
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

    <form action="{{route('checkActivity')}}" method="POST" class="qr-form">

        <input name="user_id" id="user" hidden/>

        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>
        <select name="activity_id" class="activity">
            @foreach($activities as $activity)
                <option value="{{$activity->id}}">{{$activity->name}}</option>
            @endforeach
        </select>
        <button type="submit"> تحقق</button>
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
            "qr-reader", {fps: 10, qrbox: 250});
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@stop
