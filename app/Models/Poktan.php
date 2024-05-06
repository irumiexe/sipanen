<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Penyuluh;
use App\Models\Kelompok;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poktan extends Model
{
    use HasFactory;

    protected $table = "poktan";

    protected $fillable = [
        'nama_kelompok_poktan',
        'luas_lahan_poktan',
        'no_hp_poktan',
        'alamat_poktan',
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
