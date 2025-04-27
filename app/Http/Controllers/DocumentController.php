<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\User;
use App\Models\Document;
use App\Exports\TugasExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::latest()->get();

        return view('document.index', [
            'title' => 'Dokumen',
            'documents' => $documents,
            'menuDocuments' => 'active',
        ]);
    }

    public function create()
    {
        $data = array(
            'title' => 'Tambah Dokumen',
            'menuAdminTugas' => 'active',
        );
        return view('document/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'sub_category' => 'required|string|max:100',
            'document' => 'required|file|mimes:pdf',
        ]);

        $file = $request->file('document');

        // Dapatkan ekstensi dan generate nama random
        $randomName = Str::random(40) . '.' . $file->getClientOriginalExtension();

        // Simpan file ke dalam folder 'documents' di storage/public
        $file->storeAs('documents', $randomName, 'public');


        Document::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'file_name' => $randomName,
            'status' => 'Menunggu',
        ]);

        return redirect()->back()->with('success', 'Dokumen berhasil diupload.');
    }


    public function edit($id)
    {
        $data = array(
            'title' => 'Edit Data Tugas',
            'menuAdminTugas' => 'active',
            'tugas' => Document::with('user')->findOrFail($id),
        );
        return view('admin/tugas/update', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tugas' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ], [
            'tugas.required' => 'Tugas tidak boleh kosong',
            'tanggal_mulai.required' => 'Tanggal mulai tidak boleh kosong',
            'tanggal_selesai.required' => 'Tanggal selesai tidak boleh kosong',
        ]);

        $tugas = Document::findOrFail($id);
        $tugas->tugas = $request->tugas;
        $tugas->tanggal_mulai = $request->tanggal_mulai;
        $tugas->tanggal_selesai = $request->tanggal_selesai;
        $tugas->save();

        return redirect()->route('tugas')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $tugas = Document::findOrFail($id);
        $tugas->delete();
        $user = User::where('id', $tugas->user_id)->first();
        $user->is_tugas = false;
        $user->save();

        return redirect()->route('tugas')->with('success', 'Data berhasil dihapus');
    }

    public function excel()
    {
        $filename = now()->format('d-m-Y_H.i.s');
        return Excel::download(new TugasExport, 'DataTugas_' . $filename . '.xlsx');
    }

    public function pdf()
    {
        $user = Auth::user();
        $filename = now()->format('d-m-Y_H.i.s');

        if ($user->jabatan == 'Admin') {
            $data = array(
                'tugas' => Document::with('user')->get(),
                'tanggal' => date('d-m-Y'),
                'jam' => date('H.i.s'),
            );

            $pdf = Pdf::loadView('admin/tugas/pdf', $data);
            return $pdf->setPaper('a4', 'landscape')->stream('DataTugas_' . $filename . '.pdf');
        } else {
            $data = array(
                'tanggal' => date('d-m-Y'),
                'jam' => date('H.i.s'),
                'tugas' => Document::with('user')->where('user_id', $user->id)->first(),
            );

            $pdf = Pdf::loadView('karyawan/tugas/pdf', $data);
            return $pdf->setPaper('a4', 'portrait')->stream('DataTugas_' . $filename . '.pdf');
        }

    }

    // public function accept($id)
    // {
    //     $document = Document::findOrFail($id);
    //     $document->status = 'Diterima';
    //     $document->save();

    //     return redirect()->route('documents')->with('success', 'Dokumen diterima.');
    // }

    // public function showRejectionForm($id)
    // {
    //     $document = Document::findOrFail($id);

    //     // Menambahkan 'title' di dalam data yang dikirim ke view
    //     $title = 'Revisi Dokumen: ' . $document->title;

    //     // Pastikan dokumen statusnya "Ditolak" dan ingin melakukan revisi
    //     return view('document.rejection_form', compact('document', 'title'));
    // }



    // public function reject(Request $request, $id)
    // {
    //     // Temukan dokumen yang ingin ditolak
    //     $document = Document::findOrFail($id);

    //     // Ubah status dokumen menjadi 'Ditolak'
    //     $document->status = 'Ditolak';
    //     $document->save();

    //     // Simpan alasan revisi ke tabel revisions
    //     Revision::create([
    //         'document_id' => $document->id,
    //         'user_id' => Auth::id(),
    //         'content' => $request->rejection_reason,
    //     ]);

    //     // Redirect ke halaman daftar dokumen dengan pesan sukses
    //     return redirect()->route('documents')->with('success', 'Dokumen ditolak. Alasan revisi telah disimpan.');
    // }


    // public function showRevisions($id)
    // {
    //     $document = Document::findOrFail($id);
    //     $revisions = $document->revisions()->orderBy('created_at', 'desc')->get(); // Mengambil semua revisi yang terkait dengan dokumen
    //     $title = 'Revisi Dokumen: ' . $document->title;

    //     return view('document.revisions', compact('document', 'revisions', 'title'));
    // }

}
