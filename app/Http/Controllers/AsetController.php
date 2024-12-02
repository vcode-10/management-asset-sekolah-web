<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Lokasi;
use App\Models\TipeAset;
use App\Models\Kondisi;


class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Aset::all();
        return view('asets.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi = Lokasi::all();
        $tipe = TipeAset::all();
        $kondisi = Kondisi::all();
        return view('asets.create', [
            'lokasi' => $lokasi,
            'tipe' => $tipe,
            'kondisi' => $kondisi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tipe_aset,nama',
            'tipe_aset_id' => 'required',
            'lokasi_id' => 'required',
            'kondisi_id' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $data = Aset::create([
            'nama' => $request->nama,
            'tipe_aset_id' => $request->tipe_aset_id,
            'lokasi_id' => $request->lokasi_id,
            'kondisi_id' => $request->kondisi_id,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('asets.index')
            ->with('success_message', 'Berhasil menambah Aset baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Aset::find($id);
        return view('asets.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Aset::find($id);
        $lokasi = Lokasi::all();
        $tipe = TipeAset::all();
        $kondisi = Kondisi::all();
        if (!$data) return redirect()->route('asets.index')
            ->with('error_message', ' Aset dengan id' . $id . ' tidak ditemukan');

        return view('asets.edit', [
            'data' => $data,
            'lokasi' => $lokasi,
            'tipe' => $tipe,
            'kondisi' => $kondisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|unique:tipe_aset,nama',
            'tipe_aset_id' => 'required',
            'lokasi_id' => 'required',
            'kondisi_id' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $data = Aset::find($id);
        $data->nama = $request->nama;
        $data->tipe_aset_id = $request->tipe_aset_id;
        $data->lokasi_id = $request->lokasi_id;
        $data->kondisi_id = $request->kondisi_id;
        $data->status = $request->status;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('asets.index')
            ->with('success_message', 'Berhasil mengubah Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Aset::find($id);

        $data->delete();

        return redirect()->route('asets.index')
            ->with('success_message', 'Berhasil menghapus Aset');
    }
}
