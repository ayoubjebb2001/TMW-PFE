<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENSAPP - @yield('title')</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">

  <div class="w-full mx-auto flex">

    @section('sidebar')
      <aside class="bg-stone-900 xl:w-[15%] rounded-s-md w-16 h-screen text-center xl:items-end fixed text-white">
        <h1 class="bg-stone-900 px-4 py-8 xl:text-xl font-bold text-center">ENSapp</h1>

        <ul class="text-xs my-2">
        
          <li class="my-6">
            <a href="" class="text-xs py-2 px-10 bg-orange-500 font-semibold rounded-lg">
              <i class="fa-light fa-atom"></i>
              Dashboard
            </a>
          </li>
          <li class="my-6">
            <a href="" class="py-2 px-10 hover:bg-orange-500 font-semibold rounded-lg">Dashboard</a>
          </li>
        </ul>

      </aside>
    @show

    <div class="xl:w-[85%] ml-[15%]">
        @yield('content')
    </div>

  </div>
  
</body>
</html>