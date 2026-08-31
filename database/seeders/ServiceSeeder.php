<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'nama' => 'Perpustakaan',
            'deskripsi' => 'Layanan perpustakaan untuk pengunjung',
            'status' => 'aktif'
        ]);
        Service::create([
            'nama' => 'Pembelian Produk Statistik Berbayar',
            'deskripsi' => 'Layanan pembelian produk statistik berbayar [Publikasi BPS/Data Mikro/Peta Wilayah Kerja Statistik]',
            'status' => 'aktif'
        ]);
        Service::create([
            'nama' => 'Akses Produk Statistik pada Website BPS',
            'deskripsi' => 'Layanan Akses Produk Statistik pada Website BPS',
            'status' => 'aktif'
        ]);
        Service::create([
            'nama' => 'Konsultasi Statistik',
            'deskripsi' => 'Layanan konsultasi statistik untuk pengunjung',
            'status' => 'aktif'
        ]);
        Service::create([
            'nama' => 'Rekomendasi Kegiatan Statistik',
            'deskripsi' => 'Layanan rekomendasi kegiatan statistik untuk pengunjung',
            'status' => 'aktif'
        ]);
        Service::create([
            'nama' => 'Keperluan Lainnya',
            'deskripsi' => 'Layanan keperluan lainnya untuk pengunjung',
            'status' => 'aktif'
        ]);
    }
}
