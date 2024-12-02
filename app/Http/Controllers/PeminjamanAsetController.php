<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\ItemPinjam;
use Illuminate\Http\Request;
use App\Models\Peminjam;

class PeminjamanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ItemPinjam::all();
        return view('peminjamans.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $aset = Aset::all();
        $peminjam = Peminjam::all();
        return view('peminjamans.create', [
            'aset' => $aset,
            'peminjam' => $peminjam,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'aset_id' => 'required',
            'peminjam_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            // 'tanggal_kembali' => 'required',
        ]);

        $data = ItemPinjam::create([
            'aset_id' => $request->aset_id,
            'peminjam_id' => $request->peminjam_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('peminjamans.index')
            ->with('success_message', 'Berhasil Melakukan Peminjaman Aset');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ItemPinjam::find($id);
        $aset = Aset::all();
        $peminjam = Peminjam::all();
        if (!$data) return redirect()->route('peminjamans.index')
            ->with('error_message', 'Peminjaman Aset dengan id' . $id . ' tidak ditemukan');

        return view('peminjamans.edit', [
            'data' => $data,
            'aset' => $aset,
            'peminjam' => $peminjam,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'aset_id' => 'required',
            'peminjam_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_jatuh_tempo' => 'required',
            // 'tanggal_kembali' => 'required',
        ]);

        $data = ItemPinjam::find($id);
        $data->aset_id = $request->aset_id;
        $data->peminjam_id = $request->peminjam_id;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->save();

        return redirect()->route('peminjamans.index')
            ->with('success_message', 'Berhasil mengubah Peminjaman Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ItemPinjam::find($id);

        $data->delete();

        return redirect()->route('peminjamans.index')
            ->with('success_message', 'Berhasil menghapus Peminjaman Aset');
    }
}
