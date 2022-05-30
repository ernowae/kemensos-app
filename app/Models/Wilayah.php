<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    public function lansia()
    {
        return $this->hasOne(Lansia::class, 'wilayah_id');
    }

    public function pendamping()
    {
        return $this->hasOne(Pendamping::class);
    }
}
