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

    .page {
      display: flex;
      justify-content: center;
    }

    .img-center {
      display: block;
      margin-left: 150px;
      margin-top: 75px;
      /* width: 50%; */
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>

<body dir="rtl">
  <div class="page">
    <h2 class="text-center">{{$user->fill_name_en}}</h2>
    <h4 class="text-center">{{$user->email}}</h4>
  </div>
  <div class="page-break"></div>
  <div class="page">
    <img class="img-center" src="data:image/png;base64, {{ $qrCode }}" />
  </div>
</body>

</html>