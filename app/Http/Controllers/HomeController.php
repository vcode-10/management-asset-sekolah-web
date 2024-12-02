<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Disposisi;
use App\Models\Pemeliharaan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = Carbon::today();
        $aset = Aset::whereDate('created_at', $today)->get();
        $asetcount = Aset::all();
        $pemeliharaan = Pemeliharaan::all();
        $disposisi = Disposisi::all();
        $asetRusak = Aset::where('kondisi_id', 2)->get();
        return view('home', [
            'aset' =>  $aset,
            'asetcount' =>  $asetcount,
            'pemeliharaan' => $pemeliharaan,
            'disposisi' => $disposisi,
            'asetRusak' => $asetRusak
        ]);
    }
}
