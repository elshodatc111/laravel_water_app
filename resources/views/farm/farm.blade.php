@extends('layouts.layout')
@section('title', 'Farm')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Fermalar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Fermalar</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success') }}
            </div>
        @endif 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="row">
                        <div class="col-6">
                            Aktiv <span>| firmalar</span>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Yangi firmalar</button>
                        </div>
                    </div>
                </h5>
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Firma</th>
                            <th class="text-center">Drektor</th>
                            <th class="text-center">Paymart</th>
                            <th class="text-center">Balans</th>
                            <th class="text-center">Check Message</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Farm as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>
                                <a href="{{ route('farm_show',$item['id'] ) }}"><b>{{ $item['factory_name'] }}</b></a>
                            </td>
                            <td>{{ $item['drektor'] }}</td>
                            <td>{{ $item['paymart'] }}</td>
                            <td>Balans</td>
                            <td>
                                @if($item['check_messege']=='true')
                                <span class="badge bg-success">Activ</span>
                                @else 
                                <span class="badge bg-danger">Block</span>
                                @endif
                            </td>
                            <td>
                                @if($item['status']=='true')
                                <span class="badge bg-success">Activ</span>
                                @else 
                                <span class="badge bg-danger">Block</span>
                                @endif
                            </td>
                        </tr>
                        @empty 

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
                    <h5 class="modal-title">Yangi firma</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farm_create') }}" method="post">
                        @csrf 
                        <label for="">Firma Nomi</label>
                        <input type="text" name="factory_name" required class="form-control">
                        <label for="" class="mt-2">Firma Drektori</label>
                        <input type="text" name="drektor" required class="form-control">
                        <label for="" class="mt-2">Firma telefon raqami</label>
                        <input type="text" name="phone" required class="form-control phone">
                        <label for="" class="mt-2">Firma Manzili</label>
                        <input type="text" name="addres" required class="form-control">
                        <label for="" class="mt-2">Paymart (1sheets)</label>
                        <input type="number" name="paymart" required class="form-control">
                        <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
