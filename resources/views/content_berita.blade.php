@extends('layouts.template')
@section('content')
<main id="main">
    <section id="berita" class="berita">
        <div class="container mt-3">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center fw-bold my-2">
                        {{$dataBerita->judul}}
                    </h4>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('image/berita/'.$dataBerita->cover) }}" style="width: 100%; height:500px" alt="">
                    </div>
                    <div>
                        <p class="mt-4 text-end fw-bold">
                            {{ $dataBerita->created_at }}
                        </p>
                        <p>
                            {{ $dataBerita->deskripsi }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection