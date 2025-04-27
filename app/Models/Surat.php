<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat'; // ✔️ nama tabel sesuai migration
    protected $fillable = [
        'jenis_surat',
        'perihal',
        'no_surat',
        'tanggal_surat',
        'ditujukan',
        'file_surat',
    ];

}

