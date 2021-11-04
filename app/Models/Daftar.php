<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
