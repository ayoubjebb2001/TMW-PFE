
@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('content')
    <h1 class="text-3xl font-bold underline px-12 py-6">
        Welcome : {{ Auth::user()->prenom }} {{ Auth::user()->nom }} 
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-8">

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
          <div class="mr-4">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Total Modules</h3>
            <p class="text-gray-600">{{ $modules/6 }}</p>
          </div>
        </div>
  
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
          <div class="mr-4">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Teachers</h3>
            <p class="text-gray-600">{{ $teachers }}</p>
          </div>
        </div>
  
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
          <div class="mr-4">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Inscriptions</h3>
            <p class="text-gray-600">{{ $inscriptions }}</p>
          </div>
        </div>
  
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
          <div class="mr-4">
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          </div>
          <div>
            <h3 class="text-xl font-semibold mb-2">Students</h3>
            <p class="text-gray-600">{{ $students }}</p>
          </div>
        </div>
    </div>

    <br>
    <br>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-4 gap-8">
  

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">User Growth</h3>
          <canvas id="userGrowthChart" width="400" height="200"></canvas>
        </div>
  

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">Sales Distribution</h3>
          <canvas id="salesDistributionChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  
    <script>

      var userGrowthChart = new Chart(document.getElementById('userGrowthChart').getContext('2d'), {
        type: 'line',
        data: {
          labels: ['2019', '2020', '2021', '2022', '2023'],
          datasets: [{
            label: 'inscriptions Growth',
            borderColor: 'rgb(75, 192, 192)',
            data: [10, 25, 45, 30, 50],
            fill: false,
          }]
        },
      });
  

      var salesDistributionChart = new Chart(document.getElementById('salesDistributionChart').getContext('2d'), {
        type: 'doughnut',
        data: {
          labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6'],
          datasets: [{
            data: [{{ $modules/6 }} , {{ $modules/6 }}, {{ $modules/6 }}, {{ $modules/6 }}, {{ $modules/6 }}, {{ $modules/6 }}],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
          }]
        },
      });
    </script>

@endsection