<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Frontend;
use App\Models\TenagaKerja;
use App\Models\Kegiatan;
use App\Models\Berita;
use App\Models\Jabatan;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTenagaKerja = DB::table('tenaga_kerjas')
        ->join('jabatans', 'tenaga_kerjas.id_jabatan', '=', 'jabatans.id')
        ->orderBy('id_tenagaKerja','asc')
        ->take(4)->get();
        $dataKegiatan = DB::table('kegiatans')
        ->join('kategori_kegiatans', 'kegiatans.id_kegiatan', '=', 'kategori_kegiatans.id')
        ->orderBy('id_tabelKegiatan', 'DESC')
        ->take(6)->get();
        $kategori = DB::table('kategori_kegiatans')->select('nama_kategori')->get();
        $dataBerita = Berita::all()->take(3);
        return view('welcome', compact('dataTenagaKerja', 'dataKegiatan', 'dataBerita','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Berita::find($id);
        return view('content_berita', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // halaman detail berita
    public function detailBerita($id)
    {
        $dataBerita = Berita::find($id);
        return view('content_berita', compact('dataBerita'));
    }
}
