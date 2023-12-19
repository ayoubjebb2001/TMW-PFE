<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ENSAPP - @yield('title')</title>

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


  @vite('resources/css/app.css')
</head>
<body class="bg-slate-100">

  <div class="w-full mx-auto flex">

    @section('sidebar')
      <aside class="bg-stone-900 xl:w-[15%] rounded-s-md w-16 h-screen text-center xl:items-end fixed text-white">

        <h1 class="bg-stone-900 px-4 py-8 xl:text-xl font-bold text-center">ENSapp</h1>

        <ul class="text-xs my-2 ">
        
          <li class="cursor-pointer my-1 py-1 px-6 bg-orange-500 mx-6 rounded-lg text-left">
            <a href="" class="font-semibold flex items-center justify-start">
              <i class="bx bx-pie-chart-alt-2 text-2xl mr-2 "></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="" class="font-semibold flex items-center justify-start">
              <i class="bx bx-user-check text-2xl mr-2 "></i>
              <span>Inscriptions</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="" class="font-semibold flex items-center justify-start">
              <i class="bx bxs-component text-2xl mr-2 "></i>
              <span>Filieres</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="" class="font-semibold flex items-center justify-start">
              <i class="bx bx-book text-2xl mr-2 "></i>
              <span class="">Modules</span>
            </a>
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