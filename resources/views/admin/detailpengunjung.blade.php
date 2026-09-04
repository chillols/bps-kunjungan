@extends('layouts.detailpengunjung')

@section('title', 'Detail Pengunjung')

@section('content')

<div class="max-w-3xl mx-auto">

    <!-- Header -->
    <div class="bg-white rounded-xl">

        <!-- Informasi Pengunjung -->
        <div class="p-6">

            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-5">
                INFORMASI PENGUNJUNG
            </h2>

            <div class="space-y-4">

                <!-- Nama -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Nama
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->nama }}
                    </p>
                </div>

                <!-- Jenis Kelamin -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Jenis Kelamin
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->jenis_kelamin }}
                    </p>
                </div>

                <!-- Instansi -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Instansi
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->instansi }}
                    </p>
                </div>

                <!-- Pekerjaan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Pekerjaan
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->pekerjaan }}
                    </p>
                </div>

                <!-- No HP -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        No. HP
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->no_hp }}
                    </p>
                </div>

                <!-- Email -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Email
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->email ?? '-' }}
                    </p>
                </div>

                <!-- Alamat -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Alamat
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->visitor->alamat }}
                    </p>
                </div>

            </div>


            <!-- Divider -->
            <div class="border-t border-gray-200 mt-8"></div>
            <!-- Informasi Kunjungan -->

            <h2 class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-5">
                INFORMASI KUNJUNGAN
            </h2>

            <div class="space-y-4">

                <!-- Tanggal -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Tanggal
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->created_at->format('d F Y') }}
                    </p>
                </div>

                <!-- Jam -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Jam
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->created_at->format('H:i') }}
                    </p>
                </div>

                <!-- No Antrian -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        No. Antrian
                    </p>

                    <p class="md:col-span-2 text-sm font-bold text-red-600">
                        {{ $queue->no_antrian }}
                    </p>
                </div>

                <!-- Layanan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Layanan
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->service->nama }}
                    </p>
                </div>

                <!-- Tujuan -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                    <p class="text-sm text-gray-500">
                        Tujuan
                    </p>

                    <p class="md:col-span-2 text-sm font-medium text-gray-800">
                        {{ $queue->rincian_tujuan }}
                    </p>
                </div>

                <!-- Status -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-2 items-center">
                    <p class="text-sm text-gray-500">
                        Status
                    </p>

                    <div class="md:col-span-2">

                        @if($queue->status === 'completed')
                            <span class="inline-flex items-center gap-2 px-3 py-1
                                         text-sm font-medium rounded-full
                                         bg-green-100 text-green-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                Selesai
                            </span>

                        @elseif($queue->status === 'serving')
                            <span class="inline-flex items-center gap-2 px-3 py-1
                                         text-sm font-medium rounded-full
                                         bg-blue-100 text-blue-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                Sedang Dilayani
                            </span>

                        @elseif($queue->status === 'waiting')
                            <span class="inline-flex items-center gap-2 px-3 py-1
                                         text-sm font-medium rounded-full
                                         bg-yellow-100 text-yellow-700">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full"></span>
                                Menunggu
                            </span>

                        @else
                            <span class="inline-flex items-center gap-2 px-3 py-1
                                         text-sm font-medium rounded-full
                                         bg-gray-100 text-gray-700">
                                {{ ucfirst($queue->status) }}
                            </span>
                        @endif

                    </div>
                </div>

            </div>

        </div>


        <!-- Footer -->
        <div class="flex justify-end px-6 py-4 border-t border-gray-200">

            <a
                href="{{ route('admin.datapengunjung') }}"
                class="px-5 py-2.5 text-sm font-medium
                       text-gray-600 bg-gray-100 rounded-lg
                       hover:bg-gray-200 transition"
            >
                Tutup
            </a>

        </div>

    </div>

</div>

@endsection