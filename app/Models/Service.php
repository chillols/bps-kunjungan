<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $table = 'layanan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
    ];

    public function queues(): HasMany
    {
        return $this->hasMany(
            Queue::class,
            'layanan_id'
        );
    }
}