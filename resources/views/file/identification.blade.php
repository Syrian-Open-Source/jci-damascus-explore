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
  <div style="position: relative; width: 269px; height: 351px; margin: auto;">
    <img src="https://explore.jci-damascus.com/images/qrBackground.png" style="position: absolute; width: 269px; height: 351px; z-index: -1000; border:5px solid #000" />
    <div style="position: absolute; width: 269px; text-align: center; color: white; line-height: 1.5">
      <span style="color: black; padding: .5em; margin-top: 70px; display:block; font-size:24px; font-weight: bold;" class="text-center">{{$user->fill_name_en}}</span> <br />
      <span style="color: black; padding: .5em;" class="text-center">{{$user->email}}</span>
    </div>
  </div>
  <div class="page-break"></div>
  <div style="position: relative; width: 269px; height: 351px; margin: auto;">
    <img src="https://explore.jci-damascus.com/images/qrBackground.png" style="position: absolute; width: 269px; height: 351px; z-index: -1000; border:5px solid #000" />
    <div style="position: absolute; width: 269px; text-align: center; color: white; line-height: 1.5">
      <img class="img-center" src="data:image/png;base64, {{ $qrCode }}" />
    </div>
  </div>
</body>

</html>