<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Visitor;
use App\Models\Queue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    /**
     * Menampilkan form pendaftaran kunjungan.
     */
    public function create()
    {
        return view('kunjungan.create');
    }

    /**
     * Menyimpan data pengunjung dan membuat nomor antrean.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'jam_kunjungan' => 'required|date_format:H:i',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',

            'instansi' => 'required|string|max:255',
            'instansi_lainnya' => [
                'nullable',
                'required_if:instansi,Lainnya',
                'string',
                'max:255',
            ],

            'alamat' => 'required|string|max:500',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',

            'pekerjaan' => 'required|string|max:255',
            'pekerjaan_lainnya' => [
                'nullable',
                'required_if:pekerjaan,Lainnya',
                'string',
                'max:255',
            ],

            'tujuan' => 'required|string|max:255',
            'rincian_tujuan' => 'required|string|max:1000',
        ]);

        $pengunjung = null;

        DB::transaction(function () use ($validated, &$pengunjung) {

            // Jika instansi = Lainnya
            if ($validated['instansi'] === 'Lainnya') {
                $validated['instansi'] = $validated['instansi_lainnya'];
            }

            // Jika pekerjaan = Lainnya
            if ($validated['pekerjaan'] === 'Lainnya') {
                $validated['pekerjaan'] = $validated['pekerjaan_lainnya'];
            }

            /*
             * Cari layanan berdasarkan tujuan.
             */
            $layanan = Service::where(
                'nama',
                $validated['tujuan']
            )->firstOrFail();

            /*
             * Simpan pengunjung.
             *
             * TUJUAN tidak disimpan di tabel pengunjung.
             */
            $pengunjung = Visitor::create([
                'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
                'jam_kunjungan' => $validated['jam_kunjungan'],
                'nama' => $validated['nama'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'instansi' => $validated['instansi'],
                'alamat' => $validated['alamat'],
                'no_hp' => $validated['no_hp'],
                'email' => $validated['email'] ?? null,
                'pekerjaan' => $validated['pekerjaan'],
            ]);

            /*
             * Nomor antrean berdasarkan tanggal kunjungan.
             */
            $lastQueue = Queue::whereHas('visitor', function ($query) use ($validated) {
                $query->whereDate(
                    'tanggal_kunjungan',
                    $validated['tanggal_kunjungan']
                );
            })
            ->lockForUpdate()
            ->max('no_antrian');

            $nextNumber = $lastQueue ? $lastQueue + 1 : 1;

            /*
             * Simpan antrean.
             */
            Queue::create([
                'pengunjung_id' => $pengunjung->id,
                'layanan_id' => $layanan->id,
                'no_antrian' => $nextNumber,
                'tujuan' => $validated['tujuan'],
                'rincian_tujuan' => $validated['rincian_tujuan'],
                'status' => 'menunggu',
            ]);
        });

        return redirect()->route(
            'kunjungan.antrian',
            $pengunjung->id
        );
    }

    /**
     * Menampilkan nomor antrean.
     */
    public function antrian($id)
    {
        $pengunjung = Visitor::with('queue')
            ->findOrFail($id);
        $antrian = $pengunjung->queue;
        return view('kunjungan.antrian',[
            'nama' => $pengunjung->nama,
            'no_antrian' => $antrian->no_antrian,
            'tujuan' => $antrian->tujuan,
            'tanggal_kunjungan' => $pengunjung->tanggal_kunjungan,
            'jam_kunjungan' => $pengunjung->jam_kunjungan,
            'rincian_tujuan' => $antrian->rincian_tujuan,
        ]);
    }
  public function welcome()
{
    $today = now()->toDateString();

    // Antrean yang sedang dilayani hari ini
    $queue = Queue::with([
        'visitor',
        'service'
    ])
    ->where('status', 'dilayani')
    ->whereHas('visitor', function ($query) use ($today) {
        $query->whereDate('tanggal_kunjungan', $today);
    })
    ->latest('updated_at')
    ->first();

    // Antrean selanjutnya hari ini
    $nextQueue = Queue::with([
        'visitor',
        'service'
    ])
    ->where('status', 'menunggu')
    ->whereHas('visitor', function ($query) use ($today) {
        $query->whereDate('tanggal_kunjungan', $today);
    })
    ->orderBy('no_antrian', 'asc')
    ->first();

    return view('welcome', [
        'queue' => $queue,
        'antrianSelanjutnya' => $nextQueue,
    ]);
}
    
}