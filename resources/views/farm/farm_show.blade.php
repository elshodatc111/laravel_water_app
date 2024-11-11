@extends('layouts.layout2')
@section('title', 'Farm')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Ferma</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('farm') }}">Firmalar</a></li>
          <li class="breadcrumb-item active">Ferma</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success') }}
            </div>
        @endif 
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title w-100 text-center">{{ $Farm['factory_name'] }}</h3>
                        <p><b class="m-0 p-0">Drektor: </b> {{ $Farm['drektor'] }}</p>
                        <p><b class="m-0 p-0">Telefon raqam: </b> {{ $Farm['phone'] }}</p>
                        <p><b class="m-0 p-0">Manzil: </b> {{ $Farm['addres'] }}</p>
                        <p><b class="m-0 p-0">Tarif narxi: </b> {{ $Farm['paymart'] }}</p>
                        <p><b class="m-0 p-0">Status: </b> {{ $Farm['status'] }}</p>
                        <p><b class="m-0 p-0">Messege: </b> {{ $Farm['check_messege'] }}</p>
                        <p><b class="m-0 p-0">Createt: </b> {{ $Farm['created_at'] }}</p>
                        <p><b class="m-0 p-0">Update: </b> {{ $Farm['updated_at'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title w-100 text-center">Update</h3>
                        <form action="{{ route('farm_update', $Farm['id'] ) }}" method="post">
                            @csrf 
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <label for="factory_name" class="mt-2">Ferma nomi</label>
                                    <input type="text" value="{{ $Farm['factory_name'] }}" name="factory_name" required class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="paymart" class="mt-2">To'lov summasi</label>
                                    <input type="number" value="{{ $Farm['paymart'] }}" name="paymart" required class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="drektor" class="mt-2">Drektor</label>
                                    <input type="text" value="{{ $Farm['drektor'] }}" name="drektor" required class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="phone" class="mt-2">Telefon raqam</label>
                                    <input type="text" value="{{ $Farm['phone'] }}" required name="phone" class="form-control phone">
                                </div>
                            </div>
                            <label for="addres" class="mt-2">Manzil</label>
                            <input type="text" value="{{ $Farm['addres'] }}" name="addres" required class="form-control">
                            <div class="row">
                                <div class="col-6">
                                    <label for="status" class="mt-2">Status</label>
                                    <select name="status" required class="form-select">
                                        <option value="false">false</option>
                                        <option value="true">true</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="check_messege" class="mt-2">Messege</label>
                                    <select name="check_messege" required class="form-select">
                                        <option value="false">false</option>
                                        <option value="true">true</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-2 w-100">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title w-100 text-center">Buyurtmalar</h3>
                        <table class="table table-bordered" style="font-size:14px;">
                            <tr>
                                <th>Jami buyurtmalar</th>
                                <td style="text-align:right"> 15 </td>
                            </tr>
                            <tr>
                                <th>Aktiv buyurtmalar</th>
                                <td style="text-align:right"> 15 </td>
                            </tr>
                            <tr>
                                <th>Yetqazilmoqda</th>
                                <td style="text-align:right"> 15 </td>
                            </tr>
                            <tr>
                                <th>Yakunlangan</th>
                                <td style="text-align:right"> 15 </td>
                            </tr>
                            <tr>
                                <th>Bekor qilindi</th>
                                <td style="text-align:right"> 15 </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title w-100 text-center">Firma balansi</h3>
                        <table class="table table-bordered" style="font-size:14px;">
                            <tr>
                                <th>Send SMS</th>
                                <td style="text-align:right"> {{ $Balans['messege'] }} </td>
                            </tr>
                            <tr>
                                <th>Hisoblandi</th>
                                <td style="text-align:right"> {{ $Balans['hisoblandi'] }} </td>
                            </tr>
                            <tr>
                                <th>To'lovlar</th>
                                <td style="text-align:right"> {{ $Balans['tolandi'] }} </td>
                            </tr>
                            <tr>
                                <th>Qarzdorlik</th>
                                <td style="text-align:right"> {{ $Balans['hisoblandi']-$Balans['tolandi'] }} </td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#paymart">Balansni to'ldirish</button>
                        <div class="modal fade" id="paymart" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Firma balansini to'ldirish</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="#" method="post">
                                            @csrf 
                                            <label for="">To'lov summasi</label>
                                            <input type="number" name="factory_name" required class="form-control">
                                            <label for="" class="mt-2">To'lov turi</label>
                                            <select name="" id="" class="form-select">
                                                <option value="">Tanlang</option>
                                                <option value="">Naqt</option>
                                                <option value="">Plastik</option>
                                            </select>
                                            <label for="" class="mt-2">To'lov haqida</label>
                                            <textarea name="" id="" class="form-control"></textarea>
                                            <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="row">
                        <div class="col-6">
                            Firma <span>| hodimlari</span>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Yangi hodim</button>
                        </div>
                    </div>
                </h5>
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">FIO</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">___</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($User as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['status'] }}</td>
                                <td>{{ $item['type'] }}</td>
                                <td>
                                    <form action="{{ route('farm_delete_hodim', $item['id']) }}" method="post">
                                        @csrf 
                                        @method('delete')
                                        <button class="btn btn-danger p-0 px-1"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty 
                            <tr>
                                <td colspan=7 class="text-center">Hodimlar mavjud emas</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div> 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Firma <span>| to\'lovlari</span></h5>
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">To'lov summasi</th>
                            <th class="text-center">To'lov turi</th>
                            <th class="text-center">To'lov haqida</th>
                            <th class="text-center">To'lov vaqti</th>
                            <th class="text-center">___</th>
                        </tr>
                    </thead>
                    <tbody>
                        
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
                    <h5 class="modal-title">Yangi Hodim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farm_create_hodim', $Farm['id']) }}" method="post">
                        @csrf 
                        @method('put')
                        <label for="">FIO</label>
                        <input type="text" name="factory_name" required class="form-control">
                        <label for="" class="mt-2">Phone</label>
                        <input type="text" name="phone" required class="form-control phone">
                        <label for="" class="mt-2">Lavozimi</label>
                        <select name="type" class="form-select">
                            <option value="">Tanlang</option>
                            <option value="drektor">Drektor</option>
                            <option value="despetcher">Despecher</option>
                            <option value="drever">Xaydovchi</option>
                        </select>
                        <label for="" class="mt-2">Email</label>
                        <input type="text" name="email" required class="form-control">
                        <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
