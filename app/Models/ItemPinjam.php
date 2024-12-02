<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPinjam extends Model
{
    use HasFactory;

    protected $table = 'item_pinjam';
    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function peminjam()
    {
        return $this->belongsTo(Peminjam::class);
    }
}
