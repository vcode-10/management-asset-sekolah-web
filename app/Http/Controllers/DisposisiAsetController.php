<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Disposisi;
use Illuminate\Http\Request;


class DisposisiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Disposisi::all();
        $aset = Aset::all();
        return view('disposisies.index', [
            'data' => $data,
            'tipe' => $aset
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disposisies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'aset_id' => 'required',
            'tanggal_disposisi' => 'required',
            'disposisi_oleh' => 'required',
            'alasan_disposisi' => 'required',
            'biaya' => 'required',
        ]);

        $data = Disposisi::create([
            'aset_id' => $request->aset_id,
            'tanggal_disposisi' => $request->tanggal_disposisi,
            'disposisi_oleh' => $request->disposisi_oleh,
            'alasan_disposisi' => $request->alasan_disposisi,
            'biaya' => preg_replace('/\D/', '', $request->biaya),
        ]);

        return redirect()->route('disposisies.index')
            ->with('success_message', 'Berhasil Melakukan Disposisi Aset');
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
        $data = Disposisi::find($id);
        $aset = Aset::all();
        if (!$data) return redirect()->route('disposisies.index')
            ->with('error_message', 'Disposisi Aset dengan id' . $id . ' tidak ditemukan');

        return view('disposisies.edit', [
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
            'tanggal_disposisi' => 'required',
            'disposisi_oleh' => 'required',
            'alasan_disposisi' => 'required',
            'biaya' => 'required',
        ]);

        $data = Disposisi::find($id);
        $data->aset_id = $request->aset_id;
        $data->tanggal_disposisi = $request->tanggal_disposisi;
        $data->disposisi_oleh = $request->disposisi_oleh;
        $data->alasan_disposisi = $request->alasan_disposisi;
        $data->biaya = preg_replace('/\D/', '', $request->biaya);
        $data->save();

        return redirect()->route('disposisies.index')
            ->with('success_message', 'Berhasil mengubah Disposisi Aset');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Disposisi::find($id);

        $data->delete();

        return redirect()->route('disposisies.index')
            ->with('success_message', 'Berhasil menghapus Disposisi Aset');
    }
}
