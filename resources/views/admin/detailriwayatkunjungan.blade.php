@extends('layouts.admin')

@section('title', 'Detail Riwayat Kunjungan')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <!-- Breadcrumb -->
            <div class="flex items-center gap-2 mb-2">
                <a href="{{ route('admin.riwayatkunjungan') }}"
                   class="text-sm text-gray-500 hover:text-gray-700">
                    ← Riwayat Kunjungan
                </a>
            </div>

            <h1 class="text-2xl font-bold text-gray-800">
                Detail Riwayat Kunjungan
            </h1>

            <p class="text-sm text-gray-500 mt-1">
                {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}
            </p>
        </div>

        <!-- Tombol Export -->
        <a href="{{ route('admin.riwayatkunjungan.export', $tanggal) }}"
           class="inline-flex items-center justify-center gap-2
                  px-4 py-2.5
                  bg-green-600 hover:bg-green-700
                  text-white text-sm font-medium
                  rounded-lg transition">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414A1 1 0 0118 8.414V19a2 2 0 01-2 2z" />

            </svg>

            Export Excel

        </a>

    </div>


    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <!-- Total Pengunjung -->
        <div class="bg-white rounded-xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Total Pengunjung
                    </p>

                    <p class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $queues->count() }}
                    </p>
                </div>

                <div class="w-10 h-10 bg-blue-100 text-blue-600
                            rounded-lg flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5V4H2v16h5m10-5a4 4 0 10-8 0v5h8v-5z" />

                    </svg>

                </div>

            </div>

        </div>


        <!-- Layanan -->
        <div class="bg-white rounded-xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Layanan
                    </p>

                    <p class="text-2xl font-bold text-gray-800 mt-1">
                        {{ $queues->pluck('service_id')->unique()->count() }}
                    </p>
                </div>

                <div class="w-10 h-10 bg-purple-100 text-purple-600
                            rounded-lg flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />

                    </svg>

                </div>

            </div>

        </div>


        <!-- Tanggal -->
        <div class="bg-white rounded-xl shadow-sm p-5">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-500">
                        Tanggal Kunjungan
                    </p>

                    <p class="text-lg font-bold text-gray-800 mt-1">
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                    </p>
                </div>

                <div class="w-10 h-10 bg-orange-100 text-orange-600
                            rounded-lg flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />

                    </svg>

                </div>

            </div>

        </div>

    </div>


    <!-- Tabel Pengunjung -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <!-- Header Tabel -->
        <div class="px-6 py-4 border-b">

            <div class="flex flex-col md:flex-row
                        md:items-center md:justify-between gap-3">

                <div>

                    <h2 class="font-semibold text-gray-800">
                        Daftar Pengunjung
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Data kunjungan pada tanggal
                        {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                    </p>

                </div>

            </div>

        </div>


        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <!-- Table Header -->
                <thead class="bg-gray-50 border-b">

                    <tr>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            No
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            No. Antrian
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Nama
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Jenis Kelamin
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Instansi
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Pekerjaan
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            No. HP
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Alamat
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Layanan
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Tujuan
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Tanggal Kunjungan
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Jam Kunjungan
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Status
                        </th>

                    </tr>

                </thead>


                <!-- Table Body -->
                <tbody class="divide-y">

                    @forelse ($queues as $queue)

                        <tr class="hover:bg-gray-50 transition">

                            <!-- No -->
                            <td class="px-6 py-4 text-gray-500">
                                {{ $loop->iteration }}
                            </td>


                            <!-- Nomor Antrian -->
                            <td class="px-6 py-4">

                                <span class="inline-flex items-center
                                             px-2.5 py-1
                                             rounded-md
                                             bg-blue-50
                                             text-blue-700
                                             font-semibold">

                                    {{ $queue->no_antrian ?? '-' }}

                                </span>

                            </td>


                            <!-- Nama -->
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $queue->visitor->nama ?? '-' }}
                            </td>

                            <!-- Jenis Kelamin -->
                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ $queue->visitor->jenis_kelamin ?? '-' }}
                            </td>


                            <!-- Instansi -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->instansi ?? '-' }}
                            </td>

                            <!-- Pekerjaan -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->pekerjaan ?? '-' }}
                            </td>

                            <!-- No HP -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->no_hp ?? '-' }}
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->email ?? '-' }}
                            </td>

                            <!-- Alamat -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->alamat ?? '-' }}
                            </td>

                            <!-- Layanan -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->service->nama ?? '-' }}
                            </td>


                            <!-- Tujuan -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->rincian_tujuan ?? '-' }}
                            </td>

                            <!-- Tanggal -->
                            <td class="px-6 py-4 text-gray-600">
                                {{ $queue->visitor->tanggal_kunjungan ?? '-' }}
                            </td>

                            <!-- Jam -->
                            <td class="px-6 py-4 text-gray-600">

                                @if ($queue->visitor->jam_kunjungan ?? false)

                                    {{ \Carbon\Carbon::parse(
                                        $queue->visitor->jam_kunjungan
                                    )->format('H:i') }}

                                @else

                                    {{ $queue->created_at->format('H:i') }}

                                @endif

                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4 text-gray-600">
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

                        <!-- Data Kosong -->
                        <tr>

                            <td colspan="7"
                                class="px-6 py-12 text-center">

                                <div class="flex flex-col
                                            items-center
                                            justify-center">

                                    <div class="w-12 h-12
                                                bg-gray-100
                                                rounded-full
                                                flex items-center
                                                justify-center
                                                mb-3">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-6 h-6 text-gray-400"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M9 13h6m-3-3v6m9-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                    </div>

                                    <p class="text-gray-500">
                                        Tidak ada kunjungan pada tanggal ini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection