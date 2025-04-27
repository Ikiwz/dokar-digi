<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public function view(): View
    {
        $data = array(
            'documents' => Laporan::orderBy('nama_laporan', 'asc')->get(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        );
        return view('document/laporan/excel', $data);
    }
}
