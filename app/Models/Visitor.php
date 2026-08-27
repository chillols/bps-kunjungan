<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasMany;

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
    public function queues(): HasMany
    {
        return $this->hasMany(Queue::class);
    }
}
