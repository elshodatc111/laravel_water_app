@extends('layouts.layout')
@section('title', 'Hududlar')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Hududlar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Hududlar</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <div class="row">
                        <div class="col-6">
                            Aktiv <span>| Hududlar</span>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Yangi hudud</button>
                        </div>
                    </div>
                </h5>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Hudud nomi</th>
                            <th class="text-center">Muljal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Hudud as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item['hudud_name'] }}</td>
                            <td>{{ $item['muljal'] }}</td>
                            <td>
                                @if($item['status']=='true')
                                <i class="bi bi-lock-fill"></i>
                                @else 
                                <i class="bi bi-unlock-fill"></i>
                                @endif
                            </td>
                            <td>
                                @if($item['status']=='true')
                                <form action="{{ route('hudud_look',$item['id']) }}" method="post" style="display:inline">
                                  @csrf 
                                  @method('put')
                                  <button class="btn btn-success p-0 px-1" type="submit"><i class="bi bi-unlock-fill"></i></button>
                                </form>
                              @else 
                                <form action="{{ route('hudud_look',$item['id']) }}" method="post" style="display:inline">
                                  @csrf 
                                  @method('put')
                                  <button class="btn btn-danger p-0 px-1" type="submit"><i class="bi bi-lock-fill"></i></button>
                                </form>
                              @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan=5 class="text-center">Hududlar mavjud emas.</td>
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
                    <h5 class="modal-title">Yangi Hudud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hudud_create') }}" method="post">
                      @csrf 
                        <label for="hudud_name">Hudud nomi</label>
                        <input type="text" name="hudud_name" required class="form-control" required>
                        <label for="muljal">Mo'ljal</label>
                        <input type="text" name="muljal" required class="form-control" required>
                        <button class="btn btn-primary mt-2 w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
