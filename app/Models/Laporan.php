<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans'; // nama tabel sesuai migration
    protected $fillable = [
        'nama_laporan',
        'jenis_laporan',  // Menambahkan kolom jenis_laporan ke $fillable
        'tahun_laporan',
        'file_laporan',
    ];

}
