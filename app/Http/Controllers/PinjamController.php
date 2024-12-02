<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjam::all();
        return view('peminjamans.data.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjamans.data.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:peminjam,nama',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $data = Peminjam::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        return redirect()->route('peminjams.index')
            ->with('success_message', 'Berhasil menambah Peminjam baru');
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
        $data = Peminjam::find($id);
        if (!$data) return redirect()->route('peminjams.index')
            ->with('error_message', 'Peminjam dengan id' . $id . ' tidak ditemukan');

        return view('peminjamans.data.edit', [
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
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $data = Peminjam::find($id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->save();

        return redirect()->route('peminjams.index')
            ->with('success_message', 'Berhasil mengubah Peminjam');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Peminjam::find($id);

        $data->delete();

        return redirect()->route('peminjams.index')
            ->with('success_message', 'Berhasil menghapus Peminjam');
    }
}
