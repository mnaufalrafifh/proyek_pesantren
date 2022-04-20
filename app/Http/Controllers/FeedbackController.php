<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\TenagaKerja;
use App\Models\Kegiatan;
use App\Models\Berita;
use Exception;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Feedback::orderBy("id", "DESC")->get();
        $dataTenagaKerja = TenagaKerja::count();
        $dataKegiatan = Kegiatan::count();
        $dataBerita = Berita::count();
        return view('/dashboard', compact('data', 'dataTenagaKerja', 'dataKegiatan', 'dataBerita'));
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
        $request->validate([
            'nama_feedback' => 'required',
            'email_feedback' => 'required',
            'subject_feedback' => 'required',
            'pesan_feedback' => 'required'
        ]);
        try {
            $tambahData = new Feedback;
            $tambahData->nama_feedback = $request->get('nama_feedback');
            $tambahData->email_feedback = $request->get('email_feedback');
            $tambahData->subject_feedback = $request->get('subject_feedback');
            $tambahData->pesan_feedback = $request->get('pesan_feedback');
            $tambahData->save();
            return view('welcome')->withStatus('Berhasil Memberikan Feedback');;
        } catch (Exception $e) {
            return $e;
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
        //
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
}
