<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\DokumenMutu;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\DokumenMutuExport;
use Maatwebsite\Excel\Facades\Excel;

class DocumentGugusController extends Controller
{
    public function index()
    {
        $title = "Dokumen Mutu";
        $documents = DokumenMutu::all();
        return view('document.gugus.index', compact('title', 'documents'));
    }

    public function create()
    {
        $title = "Tambah Dokumen Mutu";
        $jenis_kategoris = Kategori::where('jenis_dokumen', 'mutu')->get();
        return view('document.gugus.create', compact('title', 'jenis_kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string',
            'jenis_dokumen' => 'required|string',
            'tahun' => 'required|integer',
            'revisi' => 'nullable|string',
            'masa_berlaku' => 'nullable|date',
            'file_upload' => 'required|file|mimes:pdf,doc,docx',
        ]);

        // Simpan file
        $path = $request->file('file_upload')->store('dokumen_mutu');

        // Simpan data ke database
        DokumenMutu::create([
            'nama_dokumen' => $request->nama_dokumen,
            'jenis_dokumen' => $request->jenis_dokumen,
            'tahun' => $request->tahun,
            'revisi' => $request->revisi,
            'masa_berlaku' => $request->masa_berlaku,
            'file_upload' => $path,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil disimpan!');
    }

    public function edit($id)
    {
        $title = 'Edit Dokumen Mutu';
        $document = DokumenMutu::findOrFail($id);
        $jenis_kategoris = Kategori::where('jenis_dokumen', 'mutu')->get();
        return view('document.gugus.edit', compact('title', 'document', 'jenis_kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokumen' => 'required|string',
            'jenis_dokumen' => 'required|string',
            'tahun' => 'required|integer',
            'revisi' => 'nullable|string',
            'masa_berlaku' => 'nullable|date',
            'file_upload' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $dok = DokumenMutu::findOrFail($id);

        if ($request->hasFile('file_upload')) {
            $path = $request->file('file_upload')->store('dokumen_mutu');
            $dok->file_upload = $path;
        }

        $dok->update([
            'nama_dokumen' => $request->nama_dokumen,
            'jenis_dokumen' => $request->jenis_dokumen,
            'tahun' => $request->tahun,
            'revisi' => $request->revisi,
            'masa_berlaku' => $request->masa_berlaku,
        ]);

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dokumen = DokumenMutu::findOrFail($id);
        $dokumen->delete();

        return redirect()->route('dokumen.index')->with('success', 'Dokumen berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new DokumenMutuExport, 'DokumenMutu_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        $data = array(
            'documents' => DokumenMutu::all(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        );

        $pdf = Pdf::loadView('document.gugus.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DokumenMutu_' . $filename . '.pdf');
    }
}
