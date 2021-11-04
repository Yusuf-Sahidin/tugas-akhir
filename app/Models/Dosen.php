<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function daftar()
    {
        return $this->hasMany(Daftar::class);
    }

    public function ta()
    {
        return $this->hasMany(Ta::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
