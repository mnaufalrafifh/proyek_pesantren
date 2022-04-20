<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kegiatan;
use App\Models\KategoriKegiatan;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::all();
        $data = DB::table('kegiatans')
        ->join('kategori_kegiatans', 'kegiatans.id_kegiatan', '=', 'kategori_kegiatans.id')
        ->get();

        return view('admin.kegiatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKategoriKegiatan = KategoriKegiatan::all();
        return view('admin.kegiatan.create', compact('dataKategoriKegiatan'));
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
                'nama_kegiatan' => 'required',
                'tgl_kegiatan' => 'required',
                'id_kegiatan' => 'required',
                'cover' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg atau png'
            ],
            [
                'nama_kegiatan' => 'Nama Kegiatan',
                'tgl_kegiatan' => 'Tanggal',
                'id_kegiatan' => 'Kategori Kegiatan',
                'cover' => 'Cover'
            ]
        );

        $file = $request->file('cover');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();

        try {
            $tambahData = new Kegiatan;
            $tambahData->nama_kegiatan = $request->get('nama_kegiatan');
            $tambahData->tgl_kegiatan = $request->get('tgl_kegiatan');
            $tambahData->id_kegiatan = $request->get('id_kegiatan');
                      
            $path = public_path('image\kegiatan');
            if ($file->move($path, $final_file_name)) {
                $tambahData->cover = $final_file_name;
            }


            $tambahData->save();
             return redirect()->route('kegiatan.index')->withStatus('Berhasil Menambahkan Data');
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
        $data = Kegiatan::find($id);
        $dataKategoriKegiatan = KategoriKegiatan::all();
        return view('admin.kegiatan.edit', compact('data', 'dataKategoriKegiatan'));
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
                'nama_kegiatan' => 'required',
                'tgl_kegiatan' => 'required',
                'id_kegiatan' => 'required',
                'cover' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg atau png'
            ],
            [
                'nama_kegiatan' => 'Nama Kegiatan',
                'tgl_kegiatan' => 'Tanggal',
                'id_kegiatan' => 'Kategori Kegiatan',
                'cover' => 'Cover'
            ]
        );

        $file = $request->file('cover');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();
        try {
            $updateData = Kegiatan::find($id);
            $updateData->nama_kegiatan = $request->get('nama_kegiatan');
            $updateData->tgl_kegiatan = $request->get('tgl_kegiatan');
            $updateData->id_kegiatan = $request->get('id_kegiatan');

            if (isset($file)) {
                $path = public_path() . '\image\kegiatan/';
                $file_old = $path . $updateData->cover;
                unlink($file_old);

                $date = date("d-m-Y His");
                $final_file_name = $date . '.' . $file->getClientOriginalExtension();
                $file->move($path, $final_file_name);
                $updateData->cover = $final_file_name;
            }

            $updateData->save();
            return redirect()->route('kegiatan.index')->withStatus('Berhasil Merubah Data');
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
        $deleteData = Kegiatan::find($id)->delete();
        return redirect()->route('kegiatan.index')->withStatus('Berhasil Menghapus Data');
    }
}
