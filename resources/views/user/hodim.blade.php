@extends('layouts.layout')
@section('title', 'Hodimlar')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Hodimlar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Hodimlar</li>
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
                            Aktiv <span>| Hodimlar</span>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Yangi hodim</button>
                        </div>
                    </div>
                </h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Hodim FIO</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telefon raqam</th>
                            <th class="text-center">Lavozimi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse($User as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['type'] }}</td>
                            <td>
                              @if($item['status']=='true')
                                <span class="badge bg-success">Active</span>
                              @else 
                                <span class="badge bg-danger">Block</span>
                              @endif
                            </td>
                            <td>
                              <form action="{{ route('hodim_update_password',$item['id']) }}" method="post" style="display:inline">
                                @csrf 
                                @method('put')
                                <button class="btn btn-warning p-0 px-1" type="submit" title="Update Password"><i class="bi bi-hurricane"></i></button>
                              </form>
                              @if($item['status']=='true')
                                <form action="{{ route('hodim_create_look',$item['id']) }}" method="post" style="display:inline">
                                  @csrf 
                                  @method('put')
                                  <button class="btn btn-danger p-0 px-1" type="submit"><i class="bi bi-lock-fill"></i></button>
                                </form>
                              @else 
                                <form action="{{ route('hodim_create_look',$item['id']) }}" method="post" style="display:inline">
                                  @csrf 
                                  @method('put')
                                  <button class="btn btn-success p-0 px-1" type="submit"><i class="bi bi-unlock-fill"></i></button>
                                </form>
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
    <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yangi hodim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hodim_create') }}" method="post">
                      @csrf 
                        <label for="name">Hodim</label>
                        <input type="text" name="name" required class="form-control" required>
                        <label for="phone">Telefon raqam</label>
                        <input type="text" name="phone" required class="form-control phone" required>
                        <label for="type">Lavozimi</label>
                        <select name="type" id="type" class="form-select">
                          <option value="">Tanlang</option>
                          <option value="despetcher">Despecher</option>
                          <option value="drever">Xaydovchi</option>
                        </select>
                        <label for="email">Email</label>
                        <input type="email" name="email" required class="form-control" required>
                        <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection
