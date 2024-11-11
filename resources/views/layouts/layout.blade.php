<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
</head>
<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Water</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->email }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->type }}</span>
            </li>
            @if(Auth::user()->type=='admin')
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('farm') }}">
                <i class="bi bi-bootstrap"></i>
                <span>Firmalar</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="farm_tulov.html">
                <i class="bi bi-coin"></i>
                <span>To'lovlar</span>
              </a>
            </li>
            @endif
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="profel.html">
                <i class="bi bi-person"></i>
                <span>Profel</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Chiqish</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('home') }}">
          <i class="bi bi-grid"></i>
          <span>Bosh sahifa</span>
        </a>
      </li>
      @if(Auth::user()->type=='despetcher')
      <li class="nav-item">
        <a class="nav-link collapsed" href="buyurtma.html">
          <i class="bi bi-collection"></i>
          <span>Buyurtmalar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="report.html">
          <i class="bi bi-file-earmark-excel"></i>
          <span>Hisobot</span>
        </a>
      </li>
      @elseif(Auth::user()->type=='drektor')
      <li class="nav-item">
        <a class="nav-link collapsed" href="buyurtma.html">
          <i class="bi bi-collection"></i>
          <span>Buyurtmalar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="report.html">
          <i class="bi bi-file-earmark-excel"></i>
          <span>Hisobot</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="hodimlar.html">
          <i class="bi bi-people"></i>
          <span>Hodimlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="hududlar.html">
          <i class="bi bi-geo-alt"></i>
          <span>Hududlar</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="paymart.html">
          <i class="bi bi-coin"></i>
          <span>Balans</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="charts.html">
          <i class="bi bi-bar-chart"></i>
          <span>Statistika</span>
        </a>
      </li>
      @endif
    </ul>
  </aside>

  @yield('content')

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
      $(document).ready(function() {
        $('.amount').on('input', function() {
          var input = $(this).val();
          var numericValue = input.replace(/[^\d]/g, '');
          var formattedValue = numericValue ? parseInt(numericValue, 10).toLocaleString() : '';
          $(this).val(formattedValue);
        });
        $('.phone').inputmask({
          mask: '+\\9\\9\\8 99 999 9999',
          placeholder: ' ',
          clearMaskOnLostFocus: true
        });
      });
    </script>
</body>
</html>