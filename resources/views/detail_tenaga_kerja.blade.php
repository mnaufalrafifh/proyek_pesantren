@extends('layouts.template')
@section('content')
<main id="main">
    <section id="team" class="team">
        <div class="container mt-5">

            <div class="section-title">
              <h2>Tenaga Kerja</h2>
            </div>

            <div class="row">
    
              <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="member">
                  <img src="{{ asset('') }}front-end/assets/img/team/team-1.jpg" class="img-fluid" style="border-radius:3%" alt="">
                  <div class="member-info">
                    <div class="member-info-content">
                      <h4>Walter White</h4>
                      <span>Chief Executive Officer</span>
                      <div class="social">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
    </section>
</main>
@endsection