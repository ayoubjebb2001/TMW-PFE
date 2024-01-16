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
            <a href="{{ route('dashboard') }}" class="font-semibold flex items-center justify-start">
              <i class="bx bx-pie-chart-alt-2 text-2xl mr-2 "></i>
              <span>Dashboard</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="{{ route('teacher.index') }}" class="font-semibold flex items-center justify-start">
              <i class="bx bx-user-check text-2xl mr-2 "></i>
              <span>Teachers</span>
            </a>
          </li>

          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="{{ route('inscription.index') }}" class="font-semibold flex items-center justify-start">
              <i class="bx bx-user-check text-2xl mr-2 "></i>
              <span>Inscriptions</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="{{ route('module.index') }}" class="font-semibold flex items-center justify-start">
              <i class="bx bx-book text-2xl mr-2 "></i>
              <span class="">Modules</span>
            </a>
          </li>
          
          <li class="cursor-pointer my-1 py-1 px-6 hover:bg-orange-500 mx-6 rounded-lg transition ease-in-out duration-500">
            <a href="" class="font-semibold flex items-center justify-start">
              <i class="bx bx-calendar text-2xl mr-2 "></i>
              <span class="">calendar</span>
            </a>
          </li>

        </ul>

      </aside>
    @show

    

    <div class="xl:w-[85%] ml-[15%] px-4">

      @section('navbar')
        <nav class="py-6 px-12">
          <ul class="flex items-center justify-between">
            <li>
              <h1 class="text-4xl font-semibold">Dashboard</h1>
            </li>

            <li class="relative">
              <input type="search" name="" id="" class="rounded-xl py-2 pl-16 pr-4 w-full focus:outline-none focus:border-orange-500 transition duration-300" placeholder="search">
              <i class="bx bx-search absolute top-1/2 transform -translate-y-1/2 left-4 text-orange-500 text-lg"></i>
          </li>
          

            <li class="flex items-center justify-evenly">
              <i class='bx bx-envelope mr-4 text-3xl cursor-pointer'></i>
              <img src="{{ asset('images/7639fc698aca9f779fd6332a5c501015.png') }}" alt="" class="w-[35px] rounded-full cursor-pointer">
            </li>

              
          </ul>
        </nav>
      @show

      @yield('content')

    </div>

  </div>
  
</body>
</html>