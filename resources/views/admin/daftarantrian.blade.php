@extends('layouts.admin')

@section('title', 'Daftar Antrian')

@section('content')

    <!-- ANTRIAN SAAT INI -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-1">

        <!-- Antrian -->
        <div class="bg-white shadow-sm rounded-xl p-6">

            <p class="text-center text-gray-500">
                Antrian Saat Ini
            </p>

            <div class="text-center mb-8">

                @if($antrianSaatIni)

                    <p class="text-7xl text-gray-500 font-semibold">
                        {{ str_pad($antrianSaatIni->no_antrian, 3, '0', STR_PAD_LEFT) }}
                    </p>

                @else

                    <p class="text-7xl text-gray-500">
                        0
                    </p>

                @endif

            </div>

            <p class="text-center text-gray-500">
                Sedang Dilayani
            </p>

            {{-- Nama pengunjung --}}
            @if($antrianSaatIni)
                <p class="text-center text-gray-800 font-semibold mt-2">
                    {{ $antrianSaatIni->visitor->nama }}
                </p>
            @endif

        </div>

    </div>


 
    <!-- DAFTAR ANTRIAN HARI INI -->
    <div class="mt-8 bg-white shadow-sm rounded-xl p-6">

        <div class="flex items-center justify-between mb-5">

            <div>
                <h2 class="text-lg font-semibold text-gray-800">
                    Antrian Hari Ini
                </h2>

                <p class="text-sm text-gray-500">
                    Daftar antrian pengunjung hari ini
                </p>
            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left">

                <thead class="border-b border-gray-200">

                    <tr>

                        <th class="py-3 px-2 font-semibold text-gray-600">
                            No. Antrian
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

                        <th class="py-3 px-2 font-semibold text-gray-600">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100">

                    @forelse($queues as $queue)

                        <tr class="hover:bg-gray-50">

                            {{-- No. Antrian --}}
                            <td class="py-4 px-2 font-semibold text-gray-800">

                                {{ str_pad($queue->no_antrian, 3, '0', STR_PAD_LEFT) }}

                            </td>


                            {{-- Nama --}}
                            <td class="py-4 px-2 text-gray-700">

                                {{ $queue->visitor->nama }}

                            </td>


                            {{-- Layanan --}}
                            <td class="py-4 px-2 text-gray-700">

                                {{ $queue->service->nama }}

                            </td>


                            {{-- Tujuan --}}
                            <td class="py-4 px-2 text-gray-700">

                                <div>
                                    <p class="text-xs text-gray-400 mt-1">
                                        {{ $queue->rincian_tujuan }}
                                    </p>
                                </div>

                            </td>


                            {{-- Status --}}
                            <td class="py-4 px-2">

                                @if($queue->status === 'menunggu')

                                    <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                        Menunggu
                                    </span>

                                @elseif($queue->status === 'dilayani')

                                    <span class="px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                        Sedang Dilayani
                                    </span>

                                @elseif($queue->status === 'selesai')

                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        Selesai
                                    </span>

                                @endif

                            </td>


                            {{-- Aksi --}}
                            <td class="py-4 px-2">

                                @if($queue->status === 'menunggu')

                                    <form
                                        action="{{ route('admin.antrian.panggil', $queue->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg hover:bg-blue-700"
                                        >
                                            Panggil
                                        </button>

                                    </form>

                                @elseif($queue->status === 'dilayani')

                                    <form
                                        action="{{ route('admin.antrian.selesai', $queue->id) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="px-4 py-2 bg-green-600 text-white text-xs font-medium rounded-lg hover:bg-green-700"
                                        >
                                            Selesai
                                        </button>

                                    </form>

                                @else

                                    <span class="text-gray-400">
                                        -
                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="py-10 text-center text-gray-400"
                            >
                                Belum ada antrian hari ini.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection