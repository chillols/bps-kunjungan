<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = [
    'tanggal_kunjungan',
    'jam_kunjungan',
    'nama',
    'jenis_kelamin',
    'instansi',
    'alamat',
    'no_hp',
    'email',
    'pekerjaan',
    'jenis_keperluan',
    'deskripsi_keperluan'
];
}
