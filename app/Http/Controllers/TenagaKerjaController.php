<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TenagaKerja;
use App\Models\Jabatan;

class TenagaKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TenagaKerja::all();
        $data = DB::table('tenaga_kerjas')
        ->join('jabatans', 'tenaga_kerjas.id_jabatan', '=', 'jabatans.id')
        ->get();

        return view('admin.tenaga_kerja.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataJabatan = Jabatan::all();
        return view('admin.tenaga_kerja.create', compact('dataJabatan'));
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
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'id_jabatan' => 'required',
                'profile' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg atau png'
            ],
            [
                'nama_depan' => 'Nama Depan',
                'nama_belakang' => 'Nama Belakang',
                'jenis_kelamin' => 'Jenis Kelamin',
                'alamat' => 'Alamat',
                'id_jabatan' => 'Jabatan',
                'profile' => 'Foto'
            ]
        );

        $file = $request->file('profile');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();

          try {
            $tambahData = new TenagaKerja;
            $tambahData->nama_depan = $request->get('nama_depan');
            $tambahData->nama_belakang = $request->get('nama_belakang');
            $tambahData->jenis_kelamin = $request->get('jenis_kelamin');
            $tambahData->alamat = $request->get('alamat');
            $tambahData->id_jabatan = $request->get('id_jabatan');
            
            $path = public_path('image\tenaga_kerja');
            if ($file->move($path, $final_file_name)) {
                $tambahData->profile = $final_file_name;
            }

            $tambahData->save();
             return redirect()->route('tenaga-kerja.index')->withStatus('Berhasil Menambahkan Data');
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
        $data = TenagaKerja::find($id);
        $dataJabatan = Jabatan::all();
        return view('admin.tenaga_kerja.edit', compact('data', 'dataJabatan'));
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
                'nama_depan' => 'required',
                'nama_belakang' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'id_jabatan' => 'required',
                'profile' => 'required|mimes:png,jpg,jpeg'
            ],
            [
                'required' => ':Attribute harus terisi',
                'mimes' => ':Attribute harus berupa jpg,jpeg atau png'
            ],
            [
                'nama_depan' => 'Nama Depan',
                'nama_belakang' => 'Nama Belakang',
                'jenis_kelamin' => 'Jenis Kelamin',
                'alamat' => 'Alamat',
                'id_jabatan' => 'Jabatan',
                'profile' => 'Foto'
            ]
        );

        $file = $request->file('profile');
        $date = date("d-m-Y His");
        $final_file_name = $date . '.' . $file->getClientOriginalExtension();

        try {
            $updateData = TenagaKerja::find($id);
            $updateData->nama_depan = $request->get('nama_depan');
            $updateData->nama_belakang = $request->get('nama_belakang');
            $updateData->jenis_kelamin = $request->get('jenis_kelamin');
            $updateData->alamat = $request->get('alamat');
            $updateData->id_jabatan = $request->get('id_jabatan');

            if (isset($file)) {
                $path = public_path() . '\image\tenaga_kerja/';
                $file_old = $path . $updateData->profile;

                $date = date("d-m-Y His");
                $final_file_name = $date . '.' . $file->getClientOriginalExtension();
                $file->move($path, $final_file_name);
                $updateData->profile = $final_file_name;
            }
            $updateData->save();
            return redirect()->route('tenaga-kerja.index')->withStatus('Berhasil Merubah Data');
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
        $deleteData = TenagaKerja::find($id);
        $deleteData->delete();
        return redirect()->route('tenaga-kerja.index')->withStatus('Berhasil Menghapus Data');
    }
}
