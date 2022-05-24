<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
  <style>
    body {
      font-family: DejaVu Sans, sans-serif;
    }

    .page-break {
      page-break-after: always;
    }
    .img-center {
      display: block;
      margin-top: 75px;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>

<body dir="rtl">
  <div style="position: relative; width: 100%; height: 100%; margin: auto;">
    <img src="https://explore.jci-damascus.com/images/qrBackground.png" style="position: absolute; width: 100%; height: 100%; z-index: -1000; border:5px solid #000" />
    <div style="position: absolute; width: 100%; height: 100%; text-align: center; color: white; line-height: 1.5">
      <span style="color: black; padding: .5em; margin-top: 70px; display:block; font-size:15px; font-weight: bold;" class="text-center">{{$user->fill_name_en}}</span> <br />
      <span style="color: black; padding: .5em;" class="text-center">{{$user->local_room}}</span>
    </div>
  </div>
  <div class="page-break"></div>
  <div style="position: relative; width: 100%; height: 100%; margin: auto;">
    <img src="https://explore.jci-damascus.com/images/qrBackground.png" style="position: absolute; width: 100%; height: 100%; z-index: -1000; border:5px solid #000" />
    <div style="position: absolute; left: 10%; top: -10%; text-align: center; color: white; line-height: 1.5">
      <img class="img-center" src="data:image/png;base64, {{ $qrCode }}" />
    </div>
  </div>
</body>

</html>
