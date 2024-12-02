<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';
    protected $guarded = [];

    public function tipe_aset()
    {
        return $this->belongsTo(TipeAset::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }

    public function disposisi()
    {
        return $this->belongsTo(Disposisi::class);
    }

    public function item_pinjam()
    {
        return $this->hasMany(ItemPinjam::class);
    }

    public function pemeliharaan()
    {
        return $this->hasMany(Pemeliharaan::class);
    }
}
