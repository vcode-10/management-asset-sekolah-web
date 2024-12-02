<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;
use App\Models\TipeAset;

class PengajuanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Permintaan::all();
        $aset = TipeAset::all();
        return view('pengajuans.index', [
            'data' => $data,
            'tipe' => $aset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengajuans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tipe_aset_id' => 'required',
            'diminta_oleh' => 'required',
            'tanggal_diminta' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
        ]);

        $data = Permintaan::create([
            'tipe_aset_id' => $request->tipe_aset_id,
            'diminta_oleh' => $request->diminta_oleh,
            'tanggal_diminta' => $request->tanggal_diminta,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'status' => 'Pending' // Pending,Diterima
        ]);

        return redirect()->route('pengajuans.index')
            ->with('success_message', 'Berhasil Melakukan Pengajuan Aset');
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
        $data = Permintaan::find($id);
        $aset = TipeAset::all();
        if (!$data) return redirect()->route('pengajuans.index')
            ->with('error_message', 'Pengajuan Aset dengan id' . $id . ' tidak ditemukan');

        return view('pengajuans.edit', [
            'data' => $data,
            'tipe' => $aset
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipe_aset_id' => 'required',
            'diminta_oleh' => 'required',
            'tanggal_diminta' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required',
        ]);

        $data = Permintaan::find($id);
        $data->tipe_aset_id = $request->tipe_aset_id;
        $data->diminta_oleh = $request->diminta_oleh;
        $data->tanggal_diminta = $request->tanggal_diminta;
        $data->keterangan = $request->keterangan;
        $data->jumlah = $request->jumlah;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('pengajuans.index')
            ->with('success_message', 'Berhasil mengubah Pengajuan Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Permintaan::find($id);

        $data->delete();

        return redirect()->route('pengajuans.index')
            ->with('success_message', 'Berhasil menghapus Pengajuan Aset');
    }
}
