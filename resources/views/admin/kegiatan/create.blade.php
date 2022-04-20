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
                        <h4 class="page-title">Tambah Kegiatan</h4>
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
                                <h4 class="card-title">Tambah Data Kegiatan</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                              <form action="{{ route('kegiatan.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="" class="ml-4">Nama Kegiatan</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="text" name="nama_kegiatan" class="form-control " @error('nama_kegiatan') is-invalid @enderror id="">
                                    </div>
                                    @error('nama_kegiatan')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Tanggal Kegiatan</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="date" name="tgl_kegiatan" class="form-control " @error('tgl_kegiatan') is-invalid @enderror id="">
                                    </div>
                                    @error('tgl_kegiatan')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Kategori Kegiatan</label>
                                    <div class="col-sm-10 ml-3">
                                      <select name="id_kegiatan" id="" class="form-control" @error('id_kegiatan') is-invalid @enderror>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($dataKategoriKegiatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    @error('id_kegiatan')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Upload Foto Kegiatan</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="file" name="cover" class="form-control " @error('cover') is-invalid @enderror id="">
                                    </div>
                                    @error('cover')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <a href="/kegiatan" class="btn btn-danger ml-4">Batal</a>
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