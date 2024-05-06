<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Penyuluh;
use App\Models\Kelompok;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gapoktan extends Model
{
    use HasFactory;

    protected $table = "gapoktan";

    protected $fillable = [
        'nama_petani',
        'luas_lahan_gapoktan',
        'no_hp_gapoktan',
        'alamat_gapoktan',
        'status_gapoktan',
        'kecamatan_id',
        'penyuluh_id',
        'kelompok_id',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function penyuluh()
    {
        return $this->belongsTo(Penyuluh::class);
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class);
    }
}
