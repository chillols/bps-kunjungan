@extends('layouts.admin')

@section('title', 'Daftar Antrian')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-1">

        <!-- Antrian -->
        <div class="bg-white shadow-sm rounded-xl p-6">
            <p class="text-center text-gray-500">
                Antrian Saat Ini
            </p>

            <div class="text-center mb-8">
            <p class="text-7xl text-gray-500">
                0
            </p>

            </div>
            <p class="text-center text-gray-500">
                Sedang Dilayani
            </p>
        </div>
    </div>

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

                <th class="py-3 px-2 font-semibold text-gray-600">
                    Aksi
                </th>

            </tr>
        </thead>

@endsection