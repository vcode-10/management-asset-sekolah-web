<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    protected $table = 'disposisi';
    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }
}
