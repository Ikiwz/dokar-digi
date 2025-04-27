<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function mutu()
    {
        $title = 'Kategori Dokumen Mutu';
        $kategoris = Kategori::where('jenis_dokumen', 'mutu')->get();
        return view('kategori.mutu', compact('title', 'kategoris'));
    }

    public function laporan()
    {
        $title = 'Kategori Laporan';
        $kategoris = Kategori::where('jenis_dokumen', 'laporan')->get();
        return view('kategori.laporan', compact('title', 'kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'jenis_dokumen' => 'required|in:mutu,laporan'
        ]);

        Kategori::create($request->only(['nama_kategori', 'jenis_dokumen']));


        return back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }


}
