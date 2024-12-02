<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaan';
    protected $guarded = [];

    public function tipe_aset()
    {
        return $this->belongsTo(TipeAset::class);
    }
}
