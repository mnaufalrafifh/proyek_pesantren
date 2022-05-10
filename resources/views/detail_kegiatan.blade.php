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
                    @foreach ($kategori as $item_kategori)
                    <li data-filter=".{{  Str::slug($item_kategori->nama_kategori) }}">{{ ucwords($item_kategori->nama_kategori) }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
          
              <div class="row portfolio-container">
                @foreach ($dataKegiatan as $item)
                <div class="col-lg-4 col-md-6 portfolio-item {{ Str::slug($item->nama_kategori)}}">
                  <div class="portfolio-wrap">
                    <img src="{{ asset('image/kegiatan/'.$item->cover) }}" class="img-fluid" style="border-radius:3%; width: 100%; height:250px; max-height:400px" alt="">
                    <div class="portfolio-info">
                      <h4>{{ $item->nama_kegiatan }}</h4>
                      <p>{{ $item->nama_kategori }}</p>
                      <div class="portfolio-links">
                        <a href="{{ asset('image/kegiatan/'.$item->cover) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$item->nama_kegiatan}}"><i class="bx bx-search"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
    </section>
</main>
@endsection