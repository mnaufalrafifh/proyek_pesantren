@extends('layouts.template')
@section('content')
<main id="main">
    <section id="team" class="team">
        <div class="container mt-5">

            <div class="section-title">
              <h2>Tenaga Kerja</h2>
            </div>

            <div class="row">
    
              @foreach ($dataTenagaKerja as $item)
              <div class="col-xl-3 col-lg-4 col-md-6 data-wow-delay="0.1s">
                <div class="member">
                  <img src="{{ asset('image/tenaga_kerja/'.$item->profile) }}" class="img-fluid" style="width: 100%; height:250px; max-height:400px" alt="">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4>{{ $item->nama_depan}} {{$item->nama_belakang}}</h4>
                      <span>{{ $item->nama_jabatan }}</span>
                      {{-- <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
    </section>
</main>
@endsection