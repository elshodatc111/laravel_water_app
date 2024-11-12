@extends('layouts.layout')
@section('title', 'Balans')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Balans</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Balans</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="row">
        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title mb-0 w-100 text-center">
                Balans: <span> 15 000 so'm</span>
              </h3>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card">
            <div class="card-body pt-3">
              <button class="btn btn-success mt-1 w-100" data-bs-toggle="modal" data-bs-target="#verticalycentered">Balansni to'ldirish</button>
            </div>
          </div>
        </div>
      </div>
      
      <h5 class="card-title">To'lovlar tarixi</h5>
      <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">To'lov summasi</th>
                <th class="text-center">To'lov turi</th>
                <th class="text-center">To'lov vaqti</th>
            </tr>
        </thead>
        <tbody>
            @forelse($Paymart as $item)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $item['summa'] }}</td>
                <td>{{ $item['type'] }}</td>
                <td>{{ $item['created_at'] }}</td>
            </tr>
            @empty
              <tr>
                <td colspan=4 class="text-center">To'lovlar mavjud emas.</td>
              </tr>
            @endforelse
        </tbody>
      </table>
    </section>
  </main>
    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">To'lov qilish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <label for="">To'lov summasi</label>
                        <input type="number" required class="form-control" required>
                        <button class="btn btn-primary mt-2 w-100" type="submit">To'lov qilish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  
@endsection
