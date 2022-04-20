@extends('layouts.template')
@section('content')
<main id="main">
    <section id="portfolio" class="portfolio">
        <div class="container mt-5">

            <div class="section-title">
                <h2>Kegiatan</h2>
                <p>Kegiatan yang dilaksanakan di Pesantren Darul Hijrah pada saat <br> merayakan hari besar dan pada saat kegiatan belajar mengajar</p>
              </div>
          
              <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">Hari Besar</li>
                    <li data-filter=".filter-card">Belajar Mengajar</li>
                  </ul>
                </div>
              </div>
          
              <div class="row portfolio-container">
          
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img src="{{ asset('') }}front-end/assets/img/portfolio/portfolio-1.jpg" class="img-fluid" style="border-radius:3%" alt="">
                    <div class="portfolio-info">
                      <h4>App 1</h4>
                      <p>App</p>
                      <div class="portfolio-links">
                        <a href="{{ asset('') }}front-end/assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
    </section>
</main>
@endsection