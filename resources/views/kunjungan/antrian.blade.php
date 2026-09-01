@extends('layouts.kartu')

@section('title', 'Kartu Antrean')

@section('content')

    <!-- NOMOR ANTREAN -->
    <div class="text-center mb-8">

        <p class="text-sm font-medium text-gray-500 uppercase tracking-wide">
            Nomor Antrean Anda
        </p>

        <div class="mt-2 text-7xl font-bold text-red-600">
            {{ $no_antrian }}
        </div>

        <p class="mt-2 text-sm text-gray-500">
            Silakan menunggu panggilan
        </p>

    </div>


    <!-- DETAIL PENGUNJUNG -->
    <div class="bg-gray-50 rounded-2xl p-5 space-y-4">

        <!-- Nama -->
        <div>
            <p class="text-xs text-gray-500 uppercase tracking-wide">
                Nama Pengunjung
            </p>

            <p class="mt-1 text-base font-semibold text-gray-800">
                {{ $nama }}
            </p>
        </div>


        <!-- Tanggal -->
        <div class="flex justify-between gap-4">

            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Tanggal
                </p>

                <p class="mt-1 text-sm font-medium text-gray-800">
                    {{ $tanggal_kunjungan }}
                </p>
            </div>


            <!-- Waktu -->
            <div class="text-right">
                <p class="text-xs text-gray-500 uppercase tracking-wide">
                    Waktu
                </p>

                <p class="mt-1 text-sm font-medium text-gray-800">
                    {{ $jam_kunjungan }}
                </p>
            </div>

        </div>


        <!-- Tujuan -->
        <div>

            <p class="text-xs text-gray-500 uppercase tracking-wide">
                Jenis Kunjungan
            </p>

            <p class="mt-1 text-sm font-medium text-gray-800">
                {{ $tujuan }}
            </p>

        </div>
        <div>

            <p class="text-xs text-gray-500 uppercase tracking-wide">
                Deskripsi Tujuan
            </p>

            <p class="mt-1 text-sm font-medium text-gray-800">
                {{ $rincian_tujuan }}
            </p>

        </div>


    </div>


    <!-- INFORMASI -->
    <div class="mt-6 flex items-start gap-3 rounded-xl bg-red-50 p-4">

        <div class="flex-shrink-0 text-red-600">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M12 22a10 10 0 100-20 10 10 0 000 20z"
                />
            </svg>
        </div>

        <p class="text-sm leading-relaxed text-gray-600">
            Silakan menunggu di ruang tunggu hingga nomor antrean Anda
            dipanggil oleh petugas.
        </p>

    </div>

@endsection