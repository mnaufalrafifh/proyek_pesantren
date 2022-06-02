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
                        <h4 class="page-title">Berita</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/dashboard">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                                <h4 class="card-title">List Berita</h4>
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                                </div>
                                @endif
                            </div>
                            <div class="mb-4 ml-2">
                                <a href="{{ route('berita.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="comment-widgets" style="height:430px;">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Judul Berita</th>
                                        <th scope="col">Tanggal berita</th>
                                        <th scope="col" style="width: 30px">Excerpt</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Cover</th>
                                        <th scope="col">Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                      <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->tgl_berita }}</td>
                                        <td>{{ $item->excerpt }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td><img src="{{ asset('image/berita/'. $item->cover) }}" alt="" style="width: 150px; height:150px"></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <a href="{{ route('berita.edit', $item->id) }}" class="btn btn-warning">Ubah</a>
                                                </div>
                                                 <div class="p-2">
                                                    <form action="{{ route('berita.destroy', $item->id) }}" method="POST">
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