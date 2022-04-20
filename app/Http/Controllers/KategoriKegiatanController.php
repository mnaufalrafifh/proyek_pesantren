<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriKegiatan;

class KategoriKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriKegiatan::all();

        return view('admin.kategori_kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori_kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi',
            ],
            [
                'nama_kategori' => 'Nama Kategori'
            ]
        );
        try {
            $tambahData = new KategoriKegiatan;
            $tambahData->nama_kategori = $request->get('nama_kategori');
            $tambahData->save();
            return redirect()->route('kategori-kegiatan.index')->withStatus('Berhasil Menambahkan Data');
        } catch (Exception $e) {
            return redirect()->back()->withError('Terjadi Kesalahan');
        }
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
        $data = KategoriKegiatan::find($id);
        return view('admin.kategori_kegiatan.edit', compact('data'));
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
        $request->validate(
            [
                'nama_kategori' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi',
            ],
            [
                'nama_kategori' => 'Nama Kategori'
            ]
        );
        try {
            $updateData = KategoriKegiatan::find($id);
            $updateData->nama_kategori = $request->get('nama_kategori');
            $updateData->update();
            return redirect()->route('kategori-kegiatan.index')->withStatus('Berhasil Merubah Data');
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = KategoriKegiatan::find($id);
        $deleteData->delete();
        return redirect()->route('kategori-kegiatan.index')->withStatus('Berhasil menghapus data.');
    }
}
