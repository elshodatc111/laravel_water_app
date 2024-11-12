@extends('layouts.layout')
@section('title', 'Buyurtmalar')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Buyurtmalar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Buyurtmalar</li>
        </ol>
      </nav>
    </div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('success') }}
        </div>
    @endif   
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="row">
                        <div class="col-6">
                            Aktiv <span>| Buyurtmalar</span>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Yangi buyurtma</button>
                        </div>
                    </div>
                </h5>
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Buyurtmachi</th>
                            <th class="text-center">Buyurtma soni</th>
                            <th class="text-center">Telefon raqam</th>
                            <th class="text-center">Yetqazish manzili</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Buyurtma vaqti</th>
                            @if(auth()->user()->type=='drektor')
                            <th class="text-center">Buyurtma vaqti</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Order as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['count'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['addres'] }}</td>
                            <td><span class="badge bg-success">Yangi</span></td>
                            <td>{{ $item['created_at'] }}</td>
                            @if(auth()->user()->type=='drektor')
                            <td class="text-center">
                                <form action="{{ route('order_delete', $item['id']) }}" method="post" style="display:inline">
                                    @csrf 
                                    @method('put')
                                    <button class="btn btn-danger p-0 px-1" type="submit" title="O'chirish"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                            <tr>
                                <td colspan=7 class="text-center">Buyurtmalar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> 
    </section>
  </main>

    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yangi buyurtma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('orders_create') }}" method="post">
                        @csrf 
                        <label for="name">Buyurtmachi Ismi</label>
                        <input type="text" name="name" required class="form-control" required>
                        <div class="row mt-2">
                            <div class="col-6">
                                <label for="count">Buyurtmachi soni</label>
                                <input type="number" name="count" required class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="phone">Telefon raqami</label>
                                <input type="text" name="phone" required value="+998" class="form-control phone" required>
                            </div>
                        </div>
                        <label for="addres" class="mt-2">Buyurtmachi manzili</label>
                        <textarea required class="form-control" name="addres" required></textarea>
                        <label for="hudud_id" class="mt-2">Buyurtmachi hududi</label>
                        <select name="hudud_id" id="" class="form-select">
                            <option value="">Tanlang</option>
                            @foreach($Hudud as $item)
                            <option value="{{ $item['id'] }}">{{ $item['hudud_name'] }} ({{ $item['muljal'] }})</option>
                            @endforeach
                        </select>
                        <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  

@endsection
