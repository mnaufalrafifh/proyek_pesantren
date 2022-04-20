<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatans';
    protected $primaryKey = 'id_tabelKegiatan';
    protected $fillable = ['id','nama_kegiatan', 'tgl_kegiatan', 'cover', 'id_kegiatan'];
}
