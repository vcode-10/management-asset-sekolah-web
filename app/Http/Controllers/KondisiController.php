<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;

class KondisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kondisi::all();
        return view('kondisies.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kondisies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kondisi,nama',
            'keterangan' => 'required',
        ]);

        $data = Kondisi::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('kondisies.index')
            ->with('success_message', 'Berhasil menambah Kondisi Aset baru');
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
        $data = Kondisi::find($id);
        if (!$data) return redirect()->route('kondisies.index')
            ->with('error_message', 'Kondisi Aset dengan id' . $id . ' tidak ditemukan');

        return view('kondisies.edit', [
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

        $data = Kondisi::find($id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect()->route('kondisies.index')
            ->with('success_message', 'Berhasil mengubah Kondisi Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kondisi::find($id);

        $data->delete();

        return redirect()->route('kondisies.index')
            ->with('success_message', 'Berhasil menghapus Kondisi Aset');
    }
}
