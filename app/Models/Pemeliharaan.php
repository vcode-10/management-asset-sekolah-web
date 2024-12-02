<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table = 'pemeliharaan';
    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
}
