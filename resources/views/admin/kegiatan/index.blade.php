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
                        <h4 class="page-title">Kegiatan</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Kegiatan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Kegiatan</h4>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                                @endif
                            </div>
                            <div class="mb-4 ml-2">
                                <a href="{{ route('kegiatan.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Tanggal Kegiatan</th>
                                        <th scope="col">Kategori Kegiatan</th>
                                        <th scope="col">Cover</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_kegiatan }}</td>
                                        <td>{{ $item->tgl_kegiatan }}</td>
                                        <td>{{ $item->nama_kategori }}</td>
                                        <td><img src="{{ asset('image/kegiatan/'. $item->cover) }}" alt="" style="width: 150px; height:150px"></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <a href="{{ route('kegiatan.edit', $item->id_tabelKegiatan) }}" class="btn btn-warning">Ubah</a>
                                                </div>
                                                 <div class="p-2">
                                                    <form action="{{ route('kegiatan.destroy', $item->id_tabelKegiatan) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                      </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
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