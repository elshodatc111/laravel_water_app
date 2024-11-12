@extends('layouts.layout')
@section('title', 'Hisobotlar')
@section('content')

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Hisobotlar</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Hisobotlar</li>
        </ol>
      </nav>
    </div>
    
    <section class="section dashboard">
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">
                  <div class="row">
                      <div class="col-4 mb-0 pb-0 mt-2">
                          Hisobotlar
                      </div>
                      <div class="col-8" style="text-align: right;">
                          <form action="{{ route('report_show') }}" method="post">
                            @csrf 
                            <div class="row">
                              <div class="col-6">
                                <select name="type" class="form-select m-0" required>
                                  <option value="">Tanlang</option>
                                  <option value="all">Barcha buyurtmalar</option>
                                  <option value="new">Aktiv buyurtmalar</option>
                                  <option value="pedding">Yetqazilib beririlmoqda</option>
                                  <option value="cancel">Bekor qilingan buyurtmalar</option>
                                  <option value="delete">O'chirilgan buyurtmalar</option>
                                  <option value="end">Yetqazilgan buyurtmalar</option>
                                </select>
                              </div>
                              <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100 m-0">Qidiruv</button>
                              </div>
                            </div>
                          </form>
                      </div>
                  </div>
              </h5>
          </div>
      </div> 

    </section>
  </main>
  

@endsection
