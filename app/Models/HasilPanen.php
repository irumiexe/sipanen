<?php

namespace App\Models;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\FotoHasilPanen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilPanen extends Model
{
    use HasFactory;

    protected $table = 'hasil_panens';

    protected $fillable = [
        'luas_lahan',
        'kelompok_tani',
        'alamat_ubinan',
        'gkp',
        'gkg',
        'hasil_produksi',
        'detail_hasil_produksi',
        'url_lokasi',
        'kecamatan_id',
        'kelurahan_id',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function foto_hasil()
    {
        return $this->hasMany(FotoHasilPanen::class);
    }
}
