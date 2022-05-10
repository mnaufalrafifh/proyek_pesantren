@extends('layouts.template_back-end')
@section('content')
<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Tambah Berita</h4>
                    </div>
                    @if (session('error'))
                    <div class="alert alert-success" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tambah Data Berita</h4>
                            </div>
                            <div class="comment-widgets" style="height:530px;">
                              <form action="{{ route('berita.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="ml-4">Judul Berita</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="text" name="judul" class="form-control " @error('judul') is-invalid @enderror id="">
                                    </div>
                                    @error('judul')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Tanggal Berita</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="date" name="tgl_berita" class="form-control " @error('tgl_berita') is-invalid @enderror id="">
                                    </div>
                                    @error('tgl_berita')
                                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Excerpt Berita</label>
                                    <div class="col-sm-10 ml-3">
                                      <textarea name="excerpt" class="form-control " rows="3" cols="50" @error('excerpt') is-invalid @enderror id="" maxlength="100"></textarea>
                                    </div>
                                    @error('excerpt')
                                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Deskripsi Berita</label>
                                    <div class="col-sm-10 ml-3">
                                      <textarea name="deskripsi" class="form-control " rows="10" cols="50" @error('deskripsi') is-invalid @enderror id=""></textarea>
                                    </div>
                                    @error('deskripsi')
                                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Upload Gambar</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="file" name="cover" class="form-control " @error('cover') is-invalid @enderror id="">
                                    </div>
                                    @error('cover')
                                    <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                </div>
                                <div class="form-group mt-4">
                                    <a href="/berita" class="btn btn-danger ml-4">Batal</a>
                                    <button type="submit" class="btn btn-primary ml-1">Simpan</button>
                                </div>
                            </form>
                            </div>
                        </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Nice admin. Designed and Developed by
                <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
@endsection