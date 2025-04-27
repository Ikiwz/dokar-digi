<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class DocumentLaporanController extends Controller
{
    public function index()
    {
        $title = "Dokumen Laporan";
        $documents = Laporan::latest()->get(); // pakai latest() biar urut terbaru
        return view('document.laporan.index', compact('title', 'documents'));
    }

    public function create()
    {
        $title = "Tambah Dokumen Laporan";
        $jenis_kategoris = Kategori::where('jenis_dokumen', 'laporan')->get();
        return view('document.laporan.create', compact('title', 'jenis_kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_laporan' => 'required|string|max:255',
            'jenis_laporan' => 'required|string|max:255', // << disesuaikan
            'tahun_laporan' => 'required|integer',
            'file_laporan' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file
        $path = $request->file('file_laporan')->store('laporan');

        // Simpan data
        Laporan::create([
            'nama_laporan' => $request->nama_laporan,
            'jenis_laporan' => $request->jenis_laporan,
            'tahun_laporan' => $request->tahun_laporan,
            'file_laporan' => $path,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil disimpan!');
    }

    public function edit($id)
    {
        $title = 'Edit Dokumen Laporan';
        $document = Laporan::findOrFail($id);
        $jenis_kategoris = Kategori::where('jenis_dokumen', 'laporan')->get();
        return view('document.laporan.edit', compact('title', 'document', 'jenis_kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_laporan' => 'required|string|max:255',
            'jenis_laporan' => 'required|string|max:255', // << disesuaikan
            'tahun_laporan' => 'required|integer',
            'file_laporan' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $laporan = Laporan::findOrFail($id);

        // Kalau ada file baru
        if ($request->hasFile('file_laporan')) {
            $laporan->file_laporan = $request->file('file_laporan')->store('laporan');
        }

        // Update data
        $laporan->update([
            'nama_laporan' => $request->nama_laporan,
            'jenis_laporan' => $request->jenis_laporan,
            'tahun_laporan' => $request->tahun_laporan,
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus!');
    }

    public function exportExcel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new LaporanExport, 'DataLaporan_' . $filename . '.xlsx');
    }

    public function exportPdf()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        $data = [
            'documents' => Laporan::orderBy('nama_laporan')->get(),
            'tanggal' => date('d-m-Y'),
            'jam' => date('H.i.s'),
        ];
        $pdf = Pdf::loadView('document.laporan.pdf', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('DataLaporan_' . $filename . '.pdf');
    }
}
