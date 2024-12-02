<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Lokasi;

class PemindahanAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Aset::all();
        return view('pemindahans.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi = Lokasi::all();
        $aset = Aset::all();
        return view('pemindahans.create', [
            'lokasi' => $lokasi,
            'aset' => $aset
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'aset_id' => 'required',
            'lokasi_id' => 'required',
        ]);

        $data = Aset::find($request->aset_id);
        // dd($data);
        $data->lokasi_id = $request->lokasi_id;
        $data->save();

        return redirect()->route('pemindahans.index')
            ->with('success_message', 'Berhasil Memindahkan Aset');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Aset::find($id);
        $lokasi = Lokasi::all();
        if (!$data) return redirect()->route('pemindahans.index')
            ->with('error_message', ' Aset dengan id' . $id . ' tidak ditemukan');

        return view('pemindahans.edit', [
            'data' => $data,
            'lokasi' => $lokasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'lokasi_id' => 'required',
        ]);

        $data = Aset::find($id);
        $data->lokasi_id = $request->lokasi_id;
        $data->save();

        return redirect()->route('pemindahans.index')
            ->with('success_message', 'Berhasil Memindahkan Aset');
    }
}
