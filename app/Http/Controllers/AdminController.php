<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use App\Models\Visitor;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = now()->toDateString();

        $totalVisitors = Visitor::whereDate(
            'tanggal_kunjungan',
            $today
        )->count();

        $totalWaiting = Queue::where('status', 'waiting')
            ->whereDate('created_at', $today)
            ->count();

        $totalCalled = Queue::where('status', 'called')
            ->whereDate('created_at', $today)
            ->count();

        $totalCompleted = Queue::where('status', 'completed')
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
}