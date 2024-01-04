<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENSAPP - @yield('title')</title>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 container m-auto">

  <div class="">

      @yield('content')

  </div>
  
</body>
</html>