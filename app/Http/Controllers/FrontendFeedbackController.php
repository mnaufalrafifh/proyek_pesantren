<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Feedback;
use RealRashid\SweetAlert\Facades\Alert;


class FrontendFeedbackController extends Controller
{
    public function simpanFeedback(Request $request)
    {
        $tambahData = new Feedback;
        $tambahData->nama_feedback = request('nama_feedback');
        $tambahData->email_feedback = request('email_feedback');
        $tambahData->subject_feedback = request('subject_feedback');
        $tambahData->pesan_feedback = request('pesan_feedback');
        $tambahData->save();
        Alert::success('Sukses', 'Berhasil menambahkan feedback');
        return redirect('/');
    }
}
