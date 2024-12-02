<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeAset extends Model
{
    use HasFactory;

    protected $table = 'tipe_aset';
    protected $guarded = [];

    public function aset()
    {
        return $this->hasMany(Aset::class);
    }

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class);
    }
}
