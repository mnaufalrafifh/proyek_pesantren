<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaKerja extends Model
{
    use HasFactory;
    protected $table = 'tenaga_kerjas';
    protected $primaryKey = 'id_tenagaKerja';
    protected $fillable = ['nama_depan', 'nama_belakang', 'jenis_kelamin', 'alamat', 'id_jabatan', 'profile'];
}
