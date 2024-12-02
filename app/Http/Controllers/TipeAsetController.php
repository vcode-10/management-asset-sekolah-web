<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAset;

class TipeAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TipeAset::all();
        return view('tipeasets.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipeasets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:tipe_aset,nama',
            'keterangan' => 'required',
        ]);

        $data = TipeAset::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('tipe-asets.index')
            ->with('success_message', 'Berhasil menambah Tipe Aset baru');
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
        $data = TipeAset::find($id);
        if (!$data) return redirect()->route('tipe-asets.index')
            ->with('error_message', 'Tipe Aset dengan id' . $id . ' tidak ditemukan');

        return view('tipeasets.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $data = TipeAset::find($id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('tipe-asets.index')
            ->with('success_message', 'Berhasil mengubah Tipe Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TipeAset::find($id);

        $data->delete();

        return redirect()->route('tipe-asets.index')
            ->with('success_message', 'Berhasil menghapus Tipe Aset');
    }
}
