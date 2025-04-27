<?php

namespace App\Exports;

use App\Models\Surat;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuratExport implements FromView
{

   public function view(): View
    {
        $data = array(
            'documents' => Surat::orderBy('jenis_surat', 'asc')->get(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        );
        return view('document/surat/excel', $data);
    }
}
