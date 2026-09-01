@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Kunjungan -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <p class="text-sm text-gray-500">
                Kunjungan Hari Ini
            </p>

            <p class="text-3xl font-bold text-gray-800 mt-2">
                {{ $totalVisitors }}
            </p>
        </div>


        <!-- Menunggu -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <p class="text-sm text-gray-500">
                Antrean Menunggu
            </p>

            <p class="text-3xl font-bold text-yellow-600 mt-2">
                {{ $totalWaiting }}
            </p>
        </div>


        <!-- Dipanggil -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <p class="text-sm text-gray-500">
                Sedang Dilayani
            </p>

            <p class="text-3xl font-bold text-green-600 mt-2">
                {{ $totalCalled }}
            </p>
        </div>


        <!-- Selesai -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <p class="text-sm text-gray-500">
                Selesai Dilayani
            </p>

            <p class="text-3xl font-bold text-blue-600 mt-2">
                {{ $totalCompleted }}
            </p>
        </div>

    </div>


    <!-- Antrean -->
    <div class="mt-8 bg-white shadow-sm rounded-xl p-6">

        <div class="flex items-center justify-between mb-5">

            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    Antrean Hari Ini
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar antrean pengunjung hari ini
                </p>
            </div>

        </div>


        <div class="overflow-x-auto">

    <table class="w-full text-sm text-left">

        <thead class="border-b border-gray-200">
            <tr>

                <th class="py-3 px-2 font-semibold text-gray-600">
                    No. Antrean
                </th>

                <th class="py-3 px-2 font-semibold text-gray-600">
                    Nama Pengunjung
                </th>

                <th class="py-3 px-2 font-semibold text-gray-600">
                    Layanan
                </th>

                <th class="py-3 px-2 font-semibold text-gray-600">
                    Tujuan
                </th>

                <th class="py-3 px-2 font-semibold text-gray-600">
                    Status
                </th>

            </tr>
        </thead>

        <tbody>

            @forelse($queues as $queue)

                <tr class="border-b border-gray-100 hover:bg-gray-50">

                    {{-- No. Antrean --}}
                    <td class="py-4 px-2 font-semibold">
                        {{ $queue->no_antrian }}
                    </td>

                    {{-- Nama Pengunjung --}}
                    <td class="py-4 px-2">
                        {{ $queue->visitor->nama }}
                    </td>

                    {{-- Layanan --}}
                    <td class="py-4 px-2">
                        {{ $queue->service->nama }}
                    </td>

                    {{-- Tujuan --}}
                    <td class="py-4 px-2">
                        {{ $queue->rincian_tujuan }}
                    </td>

                    {{-- Status --}}
                    <td class="py-4 px-2">

                        @if($queue->status === 'menunggu')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-medium">
                                Menunggu
                            </span>

                        @elseif($queue->status === 'dipanggil')

                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-medium">
                                Dipanggil
                            </span>

                        @elseif($queue->status === 'selesai')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-medium">
                                Selesai
                            </span>

                        @elseif($queue->status === 'batal')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-medium">
                                Dibatalkan
                            </span>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="5" class="py-10 text-center text-gray-500">
                        Belum ada antrean hari ini.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

        </div>

    </div>

@endsection