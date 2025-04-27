<?php

namespace App\Exports;

use App\Models\DokumenMutu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DokumenMutuExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'documents' => DokumenMutu::orderBy('nama_dokumen', 'asc')->get(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        );
        return view('document/gugus/excel', $data);
    }
}
