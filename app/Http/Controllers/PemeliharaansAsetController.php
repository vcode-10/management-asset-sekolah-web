<?php

namespace App\Http\Controllers;

use App\Models\Pemeliharaan;
use App\Models\Aset;
use Illuminate\Http\Request;

class PemeliharaansAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemeliharaan::all();
        $aset = Aset::all();
        return view('pemeliharaans.index', [
            'data' => $data,
            'tipe' => $aset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemeliharaans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'aset_id' => 'required',
            'tanggal_selesai' => 'required',
            'tanggal_minta' => 'required',
            'keterangan' => 'required',
            'biaya' => 'required',
        ]);

        $data = Pemeliharaan::create([
            'aset_id' => $request->aset_id,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tanggal_minta' => $request->tanggal_minta,
            'keterangan' => $request->keterangan,
            'biaya' => preg_replace('/\D/', '', $request->biaya),
        ]);

        return redirect()->route('pemeliharaans.index')
            ->with('success_message', 'Berhasil Melakukan Data Pemeliharaan Aset');
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
        $data = Pemeliharaan::find($id);
        $aset = Aset::all();
        if (!$data) return redirect()->route('pemeliharaans.index')
            ->with('error_message', 'Pemeliharaan Aset dengan id' . $id . ' tidak ditemukan');

        return view('pemeliharaans.edit', [
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
            'aset_id' => 'required',
            'tanggal_selesai' => 'required',
            'tanggal_minta' => 'required',
            'keterangan' => 'required',
            'biaya' => 'required',
        ]);

        $data = Pemeliharaan::find($id);
        $data->aset_id = $request->aset_id;
        $data->tanggal_selesai = $request->tanggal_selesai;
        $data->tanggal_minta = $request->tanggal_minta;
        $data->keterangan = $request->keterangan;
        $data->biaya = preg_replace('/\D/', '', $request->biaya);
        $data->save();

        return redirect()->route('pemeliharaans.index')
            ->with('success_message', 'Berhasil mengubah Data Pemeliharaan Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pemeliharaan::find($id);

        $data->delete();

        return redirect()->route('pemeliharaans.index')
            ->with('success_message', 'Berhasil menghapus Data Pemeliharaan Aset');
    }
}
