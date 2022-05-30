<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    public function lansia()
    {
        return $this->belongsTo(Lansia::class, 'lansia_id');
    }

    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
