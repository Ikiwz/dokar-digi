<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Hanya kolom ini yang boleh di‐mass‐assign
    protected $fillable = [
        'nama_kategori',
        'jenis_dokumen',
    ];
}
