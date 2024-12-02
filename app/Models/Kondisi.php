<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisi';
    protected $guarded = [];

    public function aset()
    {
        return $this->hasMany(Aset::class);
    }

    public function disposisi()
    {
        return $this->hasMany(Disposisi::class);
    }
}
