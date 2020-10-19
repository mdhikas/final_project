<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'nik', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'agama', 'posisi', 'jabatan', 'id_user'
    ];
}
