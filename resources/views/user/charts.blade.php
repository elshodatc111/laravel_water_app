@extends('layouts.layout')
@section('title', 'Charts')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Charts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Charts</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">
                Charts: <span> Oylik</span>
              </h3>
            <canvas id="barChart2" style="max-height: 300px;"></canvas>
            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new Chart(document.querySelector('#barChart2'), {
                  type: 'bar',
                  data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [
                        {
                            label: 'Buyurtmalar',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                                '#20B2AA'
                            ],
                        },
                        {
                            label: 'Yetqazildi',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                                '#50C878',
                            ],
                        },
                        {
                            label: 'Bekor qilindi',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                                '#F4CA16',
                            ],
                        },
                        {
                            label: 'O\'chirildi',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                                '#EB4C42',
                            ],
                        },
                    ]
                  },
                  
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true
                      }
                    }
                  }
                });
              });
            </script>
            </div>
          </div>
        </div>
      </div>
      
    </section>
  </main>

  
@endsection