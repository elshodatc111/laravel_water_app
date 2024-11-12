@extends('layouts.layout')
@section('title', 'Hisobotlar')
@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Hisobotlar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('report') }}">Hisobotlar</a></li>
          <li class="breadcrumb-item active">Hisobot</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">
                  Hisobotlar ({{ $type }}) <button class="btn btn-warning text-white py-0" id="downloadExcel"><i class="bi bi-file-excel"></i> Print</button>
              </h5>
              <table class="table table-bordered text-center" id="myTable" style="font-size:14px">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Buyurtmachi</th>
                    <th>Telefon raqami</th>
                    <th>Buyurtmachi manzili</th>
                    <th>Buyurtma soni</th>
                    <th>Buyurtma vaqti</th>
                    <th>Xizmat ko'rsatdi</th>
                    <th>Xizmat ko'rsatildi</th>
                    <th>Buyurtma xolati</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($Order as $item)
                  <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['phone'] }}</td>
                    <td>{{ $item['addres'] }}</td>
                    <td>{{ $item['count'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    <td>{{ $item['user_email'] }}</td>
                    <td>{{ $item['updated_at'] }}</td>
                    <td>
                      @if($item['status']=='delete')
                        Buyurtma o'chirildi
                      @elseif($item['status']=='new')
                        Yangi buyurtma
                      @elseif($item['status']=='pedding')
                        Yetqazib berilmoqda
                      @elseif($item['status']=='end')
                        Xizmat ko'rsatildi
                      @elseif($item['status']=='cancel')
                        Bekor qilindi 
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan=9 class="text-center">Buyurtmalar mavjud emas.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
          </div>
      </div> 

    </section>
  </main>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/xlsx@0.16.9/dist/xlsx.full.min.js"></script>
  <script>
      $(document).ready(function() {
        $("#downloadExcel").click(function() {
          var wb = XLSX.utils.table_to_book(document.getElementById('myTable'), { sheet: "Jadval" });
          XLSX.writeFile(wb, 'jadval.xlsx');
        });
      });
  </script>
@endsection
