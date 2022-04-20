<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Exception;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Berita::all();

        return view('admin.berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.create');
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
                'judul' => 'required',
                'tgl_berita' => 'required',
                'excerpt' => 'required',
                'deskripsi' => 'required',
                'cover' => 'required|mimes:png,jpg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa png atau jpg',
            ],
            [
                'judul' => 'Judul Berita',
                'tgl_berita' => 'Tanggal',
                'excerpt' => 'Excerpt',
                'deskripsi' => 'Deskripsi',
                'cover' => 'Cover'
            ]
        );

        $file = $request->file('cover');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();
        
         try {
            $tambahData = new Berita;
            $tambahData->judul = $request->get('judul');
            $tambahData->tgl_berita = $request->get('tgl_berita');
            $tambahData->excerpt = $request->get('excerpt');
            $tambahData->deskripsi = $request->get('deskripsi');
            
            $path = public_path('image\berita');
            if ($file->move($path, $final_file_name)) {
                $tambahData->cover = $final_file_name;
            }

            $tambahData->save();
             return redirect()->route('berita.index')->withStatus('Berhasil Menambahkan Data');
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
        $data = Berita::find($id);
        return view('admin.berita.edit', compact('data'));
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
                'judul' => 'required',
                'tgl_berita' => 'required',
                'excerpt' => 'required',
                'deskripsi' => 'required',
                'cover' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg atau png'
            ],
            [
                'judul' => 'Judul Berita',
                'tgl_berita' => 'Tanggal',
                'excerpt' => 'Excerpt',
                'deskripsi' => 'Deskripsi',
                'cover' => 'Cover'
            ]
        );

        $file = $request->file('cover');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();

        try {
            $updateData = Berita::find($id);
            $updateData->judul = $request->get('judul');
            $updateData->tgl_berita = $request->get('tgl_berita');
            $updateData->excerpt = $request->get('excerpt');
            $updateData->deskripsi = $request->get('deskripsi');

            if (isset($file)) {
                $path = public_path() . '\image\berita/';
                $file_old = $path . $updateData->cover;
                unlink($file_old);

                $date = date("d-m-Y His");
                $final_file_name = $date . '.' . $file->getClientOriginalExtension();
                $file->move($path, $final_file_name);
                $updateData->cover = $final_file_name;
            }

            $updateData->save();
            return redirect()->route('berita.index')->withStatus('Berhasil Merubah Data');
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
        $deleteData = Berita::findOrFail($id);
            $path = public_path() . '\image\berita/';
            $file_old = $path . $deleteData->cover;
            unlink($file_old);
        $deleteData->delete();
        return redirect()->route('berita.index')->withStatus('Berhasil Menghapus Data');
    }
}