@extends('layouts.template')
@section('hero')
      <!-- ======= Hero Section ======= -->
  <div id="home">
    <section id="hero"> 
      <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
  
          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
  
          <div class="carousel-inner" role="listbox">
  
            <!-- Slide 1 -->
            <div class="carousel-item active" style="background-image: url({{ asset('') }}front-end/assets/img/slide/pesantren-1.png);">
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2 class="animate__animated animate__fadeInDown">Selamat Datang <br> di <br> Pesantren Darul Hijrah</h2>
                </div>
              </div>
            </div>
  
            <!-- Slide 2 -->
            <div class="carousel-item" style="background-image: url({{ asset('') }}front-end/assets/img/slide/slide-2.jpg);">
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor</h2>
                  <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                  <div>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                  </div>
                </div>
              </div>
            </div>
  
            <!-- Slide 3 -->
            <div class="carousel-item" style="background-image: url({{ asset('') }}front-end/assets/img/slide/slide-3.jpg);">
              <div class="carousel-container">
                <div class="carousel-content">
                  <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
                  <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                  <div>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                  </div>
                </div>
              </div>
            </div>
  
          </div>
  
          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
          </a>
  
          <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
          </a>
  
        </div>
      </div>
    </div><!-- End Hero -->

  </section>
@endsection
@section('content')
<main id="main">
    <section id="visimisi" class="visimisi">
        <div class="container">
            <div class="section-title">
            <h2 class="">Visi dan Misi</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-center">Visi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed vitae nisl eget ac amet, urna sit. Non faucibus pretium aliquam tempor nunc orci, leo amet.</p>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-center">Misi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed vitae nisl eget ac amet, urna sit. Non faucibus pretium aliquam tempor nunc orci, leo amet.</p>
                </div>
            </div>
        </div>  
    </section>

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Tenaga Kerja</h2>
        </div>

        <div class="d-flex justify-content-end pb-4">  
          <a href="detail_tenaga_kerja" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat Lebih Banyak</a>
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

        </div>

      </div>
    </section><!-- End Team Section -->    

    <section id="berita" class="berita">
        <div class="container">
            <div class="section-title">
                <h2>Berita</h2>
                <p>Berita terkini Pesantren Darul Hijrah</p>
            </div>
            <div class="d-flex justify-content-end pb-4">  
              <a href="detail_berita" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat Lebih Banyak</a>
            </div>
            <div class="row">
              @foreach ($dataBerita as $item)
                <div class="col-lg-4 pb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('image/berita/'.$item->cover) }}" style="width: 100%; height:250px; max-height:400px" alt="Card image cap">
                        <div class="card-body">
                            <small>
                                {{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}
                            </small>
                            <h3>{{ $item->judul }}</h3>
                          <p class="card-text" style="width: 100%; height:100px; max-height:400px">{{ $item->excerpt }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('detail.berita',$item->id) }}">Selengkapnya</a>
                        </div>
                      </div>
                </div>
                @endforeach
                {{-- <div class="col-lg-4 pb-4">
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
                </div> --}}
            </div>
        </div>
    </section>
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">

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
      <div class="d-flex justify-content-end pb-4">  
        <a href="detail_kegiatan" class="btn-get-started animate__animated animate__fadeInUp scrollto">Lihat Lebih Banyak</a>
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
            <p>{{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}</p>
            <div class="portfolio-links">
              <a href="{{ asset('image/kegiatan/'.$item->cover) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{$item->nama_kegiatan}}"><i class="bx bx-search"></i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-app">
        <div class="portfolio-wrap">
          <img src="{{ asset('') }}front-end/assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>App 3</h4>
            <p>App</p>
            <div class="portfolio-links">
              <a href="{{ asset('') }}front-end/assets/img/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src="{{ asset('') }}front-end/assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 1</h4>
            <p>Card</p>
            <div class="portfolio-links">
              <a href="{{ asset('') }}front-end/assets/img/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 portfolio-item filter-card">
        <div class="portfolio-wrap">
          <img src="{{ asset('') }}front-end/assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
          <div class="portfolio-info">
            <h4>Card 3</h4>
            <p>Card</p>
            <div class="portfolio-links">
              <a href="{{ asset('') }}front-end/assets/img/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        </div>
      </div> --}}

    </div>

  </div>
</section>
<!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Contact</h2>
    </div>

    <div class="row contact-info">

      <div class="col-md-4">
        <div class="contact-address">
          <i class="bi bi-geo-alt"></i>
          <h3>Address</h3>
          <address>Artodung, Kecamatan Galis, Pamekasan</address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="bi bi-phone"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="bi bi-envelope"></i>
          <h3>Email</h3>
          <p><a href="mailto:info@example.com">info@example.com</a></p>
        </div>
      </div>

    </div>

    <div class="section-title mt-5">
      <h2>Feedback</h2>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="container">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
              {{session('status')}}
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="form">
      <form action="{{ route('feedback.store') }}" method="POST" class="php-email-form" autocomplete="off">
        @csrf
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="nama_feedback" class="form-control" id="" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email_feedback" id="" placeholder="Your Email"  required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject_feedback" id="" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="pesan_feedback" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>
    </div>

  </div>
</section>
<!-- End Contact Section -->

</main><!-- End #main -->

@endsection