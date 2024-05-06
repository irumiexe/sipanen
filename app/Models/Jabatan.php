<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = "jabatan";

    protected $fillable = [
        'nama_jabatan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
