<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Lokasi;
use Illuminate\Support\Facades\Crypt;
use App\Models\Pemeliharaan;
use Illuminate\Support\Facades\Validator;



class ApiController extends Controller
{
    public function scanAset($id)
    {
        // return $id;;
        $aset = Aset::where('id', $id)->first();

        if ($aset) {
            return response()->json([
                'status' => 'success',
                'data' => [
                    'nama' => $aset->nama,
                    'tipe_aset_id' => $aset->tipe_aset->nama,
                    'lokasi' => $aset->lokasi->nama,
                    'kondisi_id' => $aset->kondisi->nama,
                    'status' => $aset->status,
                    'keterangan' => $aset->keterangan,
                ]
            ]);
        } else {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    }

    public function getLokasi()
    {
        $lokasis = Lokasi::select('id', 'nama')->get();
        return response()->json([
            'status' => 'success',
            'data' => $lokasis
        ]);
    }


    public function changeAset(Request $request, $id)
    {
        $request->validate([
            'lokasi_id' => 'required',
        ]);

        $aset = Aset::where('id', $id)->first();

        if (!$aset) {
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }

        $aset->lokasi_id = $request->lokasi_id;
        $aset->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Aset successfully updated'
        ]);
    }


    public function addPemeliharaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'aset_id' => 'required',
            'tanggal_selesai' => 'required|date',
            'tanggal_minta' => 'required|date',
            'keterangan' => 'nullable|string',
            'biaya' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $pemeliharaan = Pemeliharaan::create([
            'aset_id' => $request->aset_id,
            'tanggal_selesai' => $request->tanggal_selesai,
            'tanggal_minta' => $request->tanggal_minta,
            'keterangan' => $request->keterangan,
            'biaya' => preg_replace('/\D/', '', $request->biaya),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Aset Telah Diperbaiki'
        ], 201);
    }
}
