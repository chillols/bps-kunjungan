<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Visitor;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Exports\RiwayatKunjunganExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        $totalVisitors = Visitor::whereDate(
            'tanggal_kunjungan',
            $today
        )->count();

        $totalWaiting = Queue::where('status', 'menunggu')
            ->whereDate('created_at', $today)
            ->count();

        $totalCalled = Queue::where('status', 'dipanggil')
            ->whereDate('created_at', $today)
            ->count();

        $totalCompleted = Queue::where('status', 'selesai')
            ->whereDate('created_at', $today)
            ->count();

        $queues = Queue::with([
                'visitor',
                'service'
            ])
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.dashboard', [
            'totalVisitors' => $totalVisitors,
            'totalWaiting' => $totalWaiting,
            'totalCalled' => $totalCalled,
            'totalCompleted' => $totalCompleted,
            'queues' => $queues,
        ]);
    }

    public function datapengunjung(Request $request)
    {
        $today = now()->toDateString();
        $search = $request->search;

        $queues = Queue::with([
        'visitor',
        'service'
        ])
        ->whereHas('visitor', function ($query) use ($today) {
            $query->whereDate('tanggal_kunjungan', $today);
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
            $q->whereHas('visitor', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('instansi', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('pekerjaan', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
            })
            ->orWhereHas('service', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })
            ->orWhere('rincian_tujuan', 'like', "%{$search}%");
        });
        })
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.datapengunjung', [
        'queues' => $queues,
        'search' => $search,
        ]);
    }

    public function detailPengunjung($id)
    {
        $queue = Queue::with([
            'visitor',
            'service'
        ])->findOrFail($id);

        return view('admin.detailpengunjung', [
            'queue' => $queue
        ]);
    }

    public function riwayatkunjungan()
{
    $riwayat = Queue::with('visitor')
        ->get()
        ->groupBy(function ($queue) {
            return $queue->visitor->tanggal_kunjungan;
        })
        ->map(function ($queues, $tanggal) {
            return [
                'tanggal' => $tanggal,
                'jumlah' => $queues->count(),
            ];
        })
        ->sortByDesc('tanggal')
        ->values();

    return view('admin.riwayatkunjungan', compact('riwayat'));
}

    public function detailriwayatkunjungan($tanggal)
    {
    $queues = Queue::with([
        'visitor',
        'service'
    ])
    ->whereHas('visitor', function ($query) use ($tanggal) {
        $query->whereDate('tanggal_kunjungan', $tanggal);
    })
      ->orderBy('created_at', 'asc')
    ->get();

    return view('admin.detailriwayatkunjungan', [
        'queues' => $queues,
        'tanggal' => $tanggal,
    ]);
}
    public function exportriwayatkunjungan($tanggal)
    {
    return Excel::download(
        new RiwayatKunjunganExport($tanggal),
        'riwayat-kunjungan-' . $tanggal . '.xlsx'
    );
}
}