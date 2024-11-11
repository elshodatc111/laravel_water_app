@extends('layouts.layout')
@section('title', 'home')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Jami <span>| Buyurtmalar</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-arrows-fullscreen"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Yakunlangan <span>| Buyurtmalar</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6>120</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-xl-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Aktiv <span>| Buyurtmalar</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-alarm"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-xl-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Bekor qilindi <span>| Buyurtmalar</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-telephone-x"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Charts</h5>
                  <div id="reportsChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Yakunlangan',
                          data: [31, 40, 28, 51, 42, 82, 56, 15],
                        }, {
                          name: 'Aktiv',
                          data: [11, 32, 45, 32, 34, 52, 41, 45]
                        }, {
                          name: 'Bekor qilindi',
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
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
        </div>
      </div>
    </section>
  </main>
@endsection
