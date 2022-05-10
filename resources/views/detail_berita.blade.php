@extends('layouts.template')
@section('content')
<main id="main">
    <section id="berita" class="berita">
        <div class="container mt-5">

            <div class="section-title">
                <h2>Berita</h2>
                <p>Berita lengkap Pesantren Darul Hijrah</p>
            </div>
            <div class="row">
                @foreach ($data as $item)
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
                            <a href="#">Selengkapnya</a>
                        </div>
                      </div>
                </div>
                @endforeach
    </section>
</main>
@endsection