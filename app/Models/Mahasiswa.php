<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "mahasiswa_id";
    protected $fillable = ["mahasiswa_nim", "mahasiswa_nama", "mahasiswa_jurusan", "mahasiswa_alamat"];
}
