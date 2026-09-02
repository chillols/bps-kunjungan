@extends('layouts.admin')

@section('title', 'Riwayat Kunjungan')

@section('content')

<div class="space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">
            Riwayat Kunjungan
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Daftar riwayat kunjungan pengunjung berdasarkan tanggal.
        </p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <div class="px-6 py-4 border-b">
            <h2 class="font-semibold text-gray-800">
                Daftar Riwayat
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            No
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Tanggal
                        </th>

                        <th class="px-6 py-4 text-left font-semibold text-gray-600">
                            Jumlah Pengunjung
                        </th>

                        <th class="px-6 py-4 text-center font-semibold text-gray-600">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($riwayat as $item)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-800">
                                {{ \Carbon\Carbon::parse($item['tanggal'])->translatedFormat('d F Y') }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $item['jumlah'] }} pengunjung
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.detailriwayatkunjungan', $item['tanggal']) }}"
                                       class="px-3 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                                        Detail
                                    </a>

                                    <a href="{{ route('admin.riwayatkunjungan.export', $item['tanggal']) }}"
                                       class="px-3 py-2 text-sm bg-green-600 text-white rounded-lg hover:bg-green-700">
                                        Export Excel
                                    </a>

                                </div>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4"
                                class="px-6 py-10 text-center text-gray-500">
                                Belum ada riwayat kunjungan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection