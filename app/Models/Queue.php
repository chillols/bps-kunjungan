<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    use HasFactory;
    protected $table = 'antrian';
    protected $fillable = [
    'pengunjung_id',
    'layanan_id',
    'no_antrian',
    'tujuan',
    'status'
];
}
