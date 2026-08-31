<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

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
    ];

    public function queue(): HasOne
    {
        return $this->hasOne(
            Queue::class,
            'pengunjung_id'
        );
    }
}