<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Exception;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::all();

        return view('admin.jabatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jabatan.create');
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
                'nama_jabatan' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi',
            ],
            [
                'nama_jabatan' => 'Nama Jabatan'
            ]
        );
        try {
            $tambahData = new Jabatan;
            $tambahData->nama_jabatan = $request->get('nama_jabatan');
            $tambahData->save();
            return redirect()->route('jabatan.index')->withStatus('Berhasil Menambahkan Data');
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
        $data = Jabatan::find($id);
        return view('admin.jabatan.edit', compact('data'));
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
                'nama_jabatan' => 'required'
            ],
            [
                'required' => ':Attribute harus terisi',
            ],
            [
                'nama_jabatan' => 'Nama Jabatan'
            ]
        );
        try {
            $updateData = Jabatan::find($id);
            $updateData->nama_jabatan = $request->get('nama_jabatan');
            $updateData->update();
            return redirect()->route('jabatan.index')->withStatus('Berhasil Merubah Data');
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
        $deleteData = Jabatan::find($id);
        $deleteData->delete();
        return redirect()->route('jabatan.index')->withStatus('Berhasil menghapus data.');
    }
}