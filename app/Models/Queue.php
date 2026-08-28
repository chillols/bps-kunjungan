<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Queue extends Model
{
    use HasFactory;

    protected $table = 'antrian';

    protected $fillable = [
        'pengunjung_id',
        'layanan_id',
        'no_antrian',
        'tujuan',
        'status',
        'waktu_dipanggil',
        'waktu_selesai',
    ];

    protected $casts = [
        'waktu_dipanggil' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    public function visitor(): BelongsTo
    {
        return $this->belongsTo(
            Visitor::class,
            'pengunjung_id'
        );
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(
            Service::class,
            'layanan_id'
        );
    }
}