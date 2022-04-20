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
                        <h4 class="page-title">Edit Tenaga Kerja</h4>
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
                                <h4 class="card-title">Edit Data Tenaga Kerja</h4>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                              <form action="{{ route('tenaga-kerja.update', $data->id_tenagaKerja) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="" class="ml-4">Nama Depan</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="text" name="nama_depan" value="{{ old('nama_depan', $data->nama_depan) }}" class="form-control" @error('nama_depan') is-invalid @enderror id="">
                                    </div>
                                    @error('nama_depan')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Nama Belakang</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="text" name="nama_belakang" value="{{ old('nama_belakang', $data->nama_belakang) }}" class="form-control" @error('nama_belakang') is-invalid @enderror id="">
                                    </div>
                                    @error('nama_belakang')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Jenis Kelamin</label>
                                    <div class="col-sm-10 ml-3">
                                      <select name="jenis_kelamin" class="form-control" @error('jenis_kelamin') is-invalid @enderror id="">
                                          <option value="">Pilih Jenis Kelamin</option>
                                          <option value="L">Laki-Laki</option>
                                          <option value="P">Perempuan</option>
                                      </select>
                                    </div>
                                    @error('jenis_kelamin')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Alamat</label>
                                    <div class="col-sm-10 ml-3">
                                      <textarea name="alamat" class="form-control" rows="10" cols="50" @error('alamat') is-invalid @enderror id="">{{ old('alamat', $data->alamat) }}</textarea>
                                    </div>
                                    @error('alamat')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Jabatan</label>
                                    <div class="col-sm-10 ml-3">
                                      <select name="id_jabatan" class="form-control" @error('id_jabatan') is-invalid @enderror id="">
                                            <option value="">Pilih Jabatan</option>
                                          @foreach($dataJabatan as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $data->id_jabatan ? 'selected' : '' }}> {{$item->nama_jabatan}} </option>
                                          @endforeach
                                      </select>
                                    </div>
                                    @error('id_jabatan')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <label for="" class="ml-4 mt-2">Upload Gambar</label>
                                    <div class="col-sm-10 ml-3">
                                      <input type="file" name="profile" class="form-control " @error('profile') is-invalid @enderror id="">
                                    </div>
                                    @error('profile')
                                        <small class="text-danger ml-4" for="">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <a href="/tenaga-kerja" class="btn btn-danger ml-4">Batal</a>
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