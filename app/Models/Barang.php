<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    protected $fillable = [
        'status',
        'harga',
        'keterangan',
        'foto',
        'nama_barang',
        'jumlah',
        'pengajuan_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
