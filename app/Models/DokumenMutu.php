<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenMutu extends Model
{
    protected $table = 'dokumen_mutu'; // ✅ Tambahkan baris ini
    protected $fillable = [
        'nama_dokumen',
        'jenis_dokumen',
        'tahun',
        'revisi',
        'masa_berlaku',
        'file_upload',
    ];

}

