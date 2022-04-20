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
                        <h4 class="page-title">Tambah Kategori</h4>
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
                                <h4 class="card-title">Tambah Data Kategori</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                              <form action="{{ route('kategori-kegiatan.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="ml-4">Nama Kategori</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="text" name="nama_kategori" class="form-control " @error('nama_kategori') is-invalid @enderror id="">
                                    </div>
                                    @error('nama_kategori')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <a href="/kategori-kegiatan" class="btn btn-danger ml-4">Batal</a>
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