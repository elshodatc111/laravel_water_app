@extends('layouts.layout')
@section('title', 'home')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success') }}
        </div>
    @endif 
    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Charts</h5>
              <div id="reportsChart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Buyurtmalar',
                      data: [31, 40, 28, 51, 42, 82, 56, 15],
                    }, {
                      name: 'Yetqazildi',
                      data: [11, 32, 45, 32, 34, 52, 41, 45]
                    }, {
                      name: 'Bekor qilindi',
                      data: [15, 11, 32, 18, 9, 24, 11,86]
                    }, {
                      name: 'O\'chirildi',
                      data: [15, 11, 32, 18, 9, 24, 11,86]
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: false
                      },
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d','#CC397B'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: [
                        "2018-09-01", 
                        "2018-09-02", 
                        "2018-09-03", 
                        "2018-09-04", 
                        "2018-09-05", 
                        "2018-09-06", 
                        "2018-09-07", 
                        "2018-09-08"
                      ]
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      },
                    }
                  }).render();
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
