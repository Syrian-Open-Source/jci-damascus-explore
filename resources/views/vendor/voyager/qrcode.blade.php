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


        <div id="qr-reader"></div>
        <div id="qr-reader-results"></div>
        <select name="activity_id" class="activity">
            <option value="public" data-users="{{$users}}">Public registration</option>
            @foreach($activities as $activity)
                <option value="{{$activity->id}}" data-users="{{$activity->users}}">{{$activity->name}}</option>
            @endforeach
        </select>
    </form>
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        var resultContainer = document.getElementById('qr-reader-results');
        let lastTime = null;

        function onScanSuccess(decodedText, decodedResult) {
            if (!(lastTime != null && (Date.now() - lastTime) <= 2500 )) {
                lastTime = Date.now()
                popupShow = true;
                const chooseActivity = document.querySelector('.activity');
                const users = JSON.parse(chooseActivity.selectedOptions[0].dataset.users);
                let html = '<p style="color: green">Registered</p>';
                let icon = 'success';
                if (users.find(item => item.id == parseInt(decodedText)) == undefined) {
                    html = '<p style="color: red"> Not Registered</p>';
                    icon = 'error';
                }
                Swal.fire({
                        title: 'Registration status',
                        html: html,
                        timer: 2000,
                        timerProgressBar: true,
                        icon: icon,
                    })
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", {fps: 10, qrbox: {width: 300, height: 300}});
        html5QrcodeScanner.render(onScanSuccess);
    </script>
@stop
