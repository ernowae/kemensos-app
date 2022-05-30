<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lansia extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function pendamping()
    {
        return $this->belongsTo(Pendamping::class, 'pendamping_id');
    }

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class);
    }
}
