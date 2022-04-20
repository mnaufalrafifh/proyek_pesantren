@extends('layouts.template')
@section('content')
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container mt-5">

            <div class="section-title">
                <h2>Berita</h2>
                <p>Berita lengkap Pesantren Darul Hijrah</p>
            </div>
            <div class="row">
                <div class="col-lg-4 pb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('') }}front-end/assets/img/portfolio/portfolio-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <small>
                                1 Bulan yang lalu
                            </small>
                            <h3>Pengumuman</h3>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="#">Selengkapnya</a>
                        </div>
                      </div>
                </div>
    </section>
</main>
@endsection