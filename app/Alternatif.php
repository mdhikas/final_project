<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

class Alternatif extends Model
{
    protected $table = 'alternatifs';
    protected $fillable = [
        'kode', 'nama_alternatif'
    ];
}
