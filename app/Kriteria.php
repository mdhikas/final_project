<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriterias';
    protected $fillable = [
        'kode', 'nama_kriteria', 'bobot', 'minmax', 'tipe_preferensi', 'q', 'p'
    ];
}
