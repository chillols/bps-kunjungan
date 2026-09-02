@extends('layouts.admin')

@section('title', 'Data Pengunjung')

@section('content')

    <div class="grid grid-cols-1 gap-1">

    <!-- Search Pengunjung -->
    <div class="bg-white shadow-sm rounded-xl p-6">

        <p class="text-gray-700 font-semibold mb-4">
            Cari Data Pengunjung
        </p>

        <form action="{{ route('admin.datapengunjung') }}" method="GET">

            <div class="flex items-center gap-3 max-w-xl">

                <div class="relative flex-1">

                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                        🔍
                    </span>

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari nama, instansi, layanan..."
                        class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-lg
                               focus:outline-none focus:ring-2 focus:ring-red-500
                               focus:border-red-500"
                    >

                </div>

                <button
                    type="submit"
                    class="px-5 py-3 bg-red-600 text-white rounded-lg
                           hover:bg-red-700 transition"
                >
                    Cari
                </button>

                @if(!empty($search))
                    <a
                        href="{{ route('admin.datapengunjung') }}"
                        class="px-5 py-3 bg-gray-100 text-gray-600 rounded-lg
                               hover:bg-gray-200 transition"
                    >
                        Reset
                    </a>
                @endif

            </div>

        </form>

    </div>

</div>

<div class="mt-8 bg-white shadow-sm rounded-xl p-6">

    <div class="flex items-center justify-between mb-5">

        <div>
            <h2 class="text-lg font-semibold text-gray-800">
                Pengunjung Hari Ini
            </h2>

            <p class="text-sm text-gray-500">
                Daftar pengunjung hari ini
                @if(!empty($search))
                    — hasil pencarian: "{{ $search }}"
                @endif
            </p>
        </div>

        <div class="text-sm text-gray-500">
            {{ $queues->count() }} pengunjung
        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm text-left">

            <thead class="border-b border-gray-200">
                <tr>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        No.
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Nama Pengunjung
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Instansi
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        No. HP
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Pekerjaan
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Alamat
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Layanan
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Tujuan
                    </th>

                    <th class="py-3 px-2 font-semibold text-gray-600">
                        Aksi
                    </th>

                </tr>
            </thead>

            <tbody>

                @forelse($queues as $index => $queue)

                    <tr class="border-b border-gray-100 hover:bg-gray-50">

                        {{-- No --}}
                        <td class="py-4 px-2">
                            {{ $index + 1 }}
                        </td>

                        {{-- Nama --}}
                        <td class="py-4 px-2 font-medium text-gray-800">
                            {{ $queue->visitor->nama }}
                        </td>

                        {{-- Instansi --}}
                        <td class="py-4 px-2">
                            {{ $queue->visitor->instansi }}
                        </td>

                        {{-- No. HP --}}
                        <td class="py-4 px-2">
                            {{ $queue->visitor->no_hp }}
                        </td>

                        {{-- Pekerjaan --}}
                        <td class="py-4 px-2">
                            {{ $queue->visitor->pekerjaan }}
                        </td>

                        {{-- Alamat --}}
                        <td class="py-4 px-2">
                            {{ $queue->visitor->alamat }}
                        </td>

                        {{-- Layanan --}}
                        <td class="py-4 px-2">
                            {{ $queue->service->nama }}
                        </td>

                        {{-- Tujuan --}}
                        <td class="py-4 px-2">
                            {{ $queue->rincian_tujuan }}
                        </td>

                        {{-- Aksi --}}
                        <td class="py-4 px-2">
                        <a href="{{ route('admin.datapengunjung.detail', $queue->id) }}"
                            class="px-3 py-2 text-sm text-red-600
                                bg-red-50 rounded-lg
                                hover:bg-red-100 transition" >
                            Detail
                        </a>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="9" class="py-10 text-center text-gray-500">
                            @if(!empty($search))
                                Data pengunjung dengan kata
                                <strong>"{{ $search }}"</strong>
                                tidak ditemukan.
                            @else
                                Belum ada pengunjung hari ini.
                            @endif
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection