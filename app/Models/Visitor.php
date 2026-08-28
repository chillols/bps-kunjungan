<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function queues(): HasMany
    {
        return $this->hasMany(
            Queue::class,
            'pengunjung_id'
        );
    }
}