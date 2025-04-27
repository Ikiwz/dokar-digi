<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Exports\SuratExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class DocumentSuratController extends Controller
{
    public function index()
    {
        $title = 'Surat Menyurat';
        $documents = Surat::latest()->get();

        return view('document.surat.index', compact('title', 'documents'));
    }
    public function create()
    {
        $title = "Tambah Surat";
        return view('document.surat.create', compact('title'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'jenis_surat' => 'required|string',
            'perihal' => 'required|string',
            'no_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'ditujukan' => 'required|string',
            'file_surat' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $path = $request->file('file_surat')->store('surat');

        Surat::create([
            'jenis_surat' => $request->jenis_surat,
            'perihal' => $request->perihal,
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'ditujukan' => $request->ditujukan,
            'file_surat' => $path,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil disimpan!');
    }
    public function edit($id)
    {
        $title = 'Edit Surat';
        $document = Surat::findOrFail($id);
        return view('document.surat.edit', compact('title', 'document'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_surat' => 'required|string',
            'perihal' => 'required|string',
            'no_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'ditujukan' => 'required|string',
            'file_surat' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $surat = Surat::findOrFail($id);

        if ($request->hasFile('file_surat')) {
            $path = $request->file('file_surat')->store('surat');
            $surat->file_surat = $path;
        }

        $surat->update([
            'jenis_surat' => $request->jenis_surat,
            'perihal' => $request->perihal,
            'no_surat' => $request->no_surat,
            'tanggal_surat' => $request->tanggal_surat,
            'ditujukan' => $request->ditujukan,
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $surat = \App\Models\Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus');
    }

    public function exportExcel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new SuratExport, 'DataSurat_' . $filename . '.xlsx');
    }

    public function exportPdf()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'documents' => \App\Models\Surat::orderBy('jenis_surat', 'asc')->get(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        );

        $pdf = Pdf::loadView('document.surat.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataSurat_' . $filename . '.pdf');
    }

}
