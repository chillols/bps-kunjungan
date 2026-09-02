<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Buku Kunjungan BPS</title>

    {{-- Tailwind CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

    {{-- =========================
        NAVBAR
    ========================== --}}
    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Logo --}}
                <a href="{{ url('/') }}" class="flex items-center gap-3">

                    <div class="w-20 h-20 flex items-center justify-center">
                         <img 
                        src="{{ asset('images/logo_bps.png') }}" 
                        alt="Logo BPS"
                        class="w-20 h-20 object-contain"
                        >
                    </div>

                    <div>
                        <p class="font-bold text-gray-900 leading-tight">
                            Buku Tamu & Layanan
                        </p>

                        <p class="text-xs text-gray-500">
                            Badan Pusat Statistik Kabupaten Sijunjung
                        </p>
                    </div>

                </a>

                {{-- Login Admin --}}
                <a href="{{ route('login') }}"
                   class="text-sm font-medium text-gray-600 hover:text-red-600 transition">
                    Login Admin
                </a>

            </div>
        </div>
    </nav>


    {{-- =========================
        HERO
    ========================== --}}
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center py-20 lg:py-28">

                {{-- Hero Text --}}
                <div>

                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-red-50 text-red-600 text-sm font-medium mb-6">
                        Layanan Kunjungan BPS
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-4xl font-extrabold text-gray-900 leading-tight">
                        Selamat Datang di
                        <span class="text-red-600">
                            BPS Kabupaten Sijunjung
                        </span>
                    </h1>

                    <p class="mt-6 text-lg text-gray-600 leading-relaxed max-w-xl">
                        Silakan lakukan pendaftaran kunjungan secara online
                        untuk mendapatkan nomor antrean dan memperoleh
                        layanan dengan lebih mudah dan tertib.
                    </p>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 mt-8">

                        <a href="{{ route('kunjungan.create') }}"
                                class="inline-flex items-center justify-center px-7 py-3.5
                                    bg-red-600 text-white font-semibold rounded-lg
                                    hover:bg-red-700 transition shadow-sm">
                            Daftar Kunjungan
                        </a>

                        <a href="#"
                           class="inline-flex items-center justify-center px-7 py-3.5
                                  bg-white text-gray-700 font-semibold rounded-lg
                                  border border-gray-300
                                  hover:bg-gray-50 transition">
                            Cek Antrean
                        </a>

                    </div>

                </div>


                {{-- Hero Illustration --}}
                <div class="flex justify-center lg:justify-end">

                    <div class="relative w-full max-w-md">

                        <div class="absolute inset-0 bg-red-100 rounded-3xl rotate-3"></div>

                        <div class="relative bg-white rounded-3xl shadow-xl border border-gray-100 p-8">

                            <div class="flex items-center justify-between mb-8">

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Nomor Antrean Saat Ini
                                    </p>

                                    <p class="text-4xl font-extrabold text-red-600 mt-1">
                                        {{ $queue->no_antrian ?? '-' }}
                                    </p>
                                </div>

                                <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>

                            </div>

                            <div class="space-y-4">

                                <div class="flex justify-between p-4 bg-gray-50 rounded-xl">
                                    <span class="text-sm text-gray-500">
                                        Status
                                    </span>

                                    <span class="text-sm font-semibold text-yellow-600">
                                        {{ $queue->status ?? '-' }}
                                    </span>
                                </div>

                                <div class="flex justify-between p-4 bg-gray-50 rounded-xl">
                                    <span class="text-sm text-gray-500">
                                        Layanan
                                    </span>

                                    <span class="text-sm font-semibold text-gray-800">
                                        {{ $queue->service->nama ?? '-' }}
                                    </span>
                                </div>

                                <div class="flex justify-between p-4 bg-gray-50 rounded-xl">
                                    <span class="text-sm text-gray-500">
                                        Antrean Selanjutnya
                                    </span>

                                    <span class="text-sm font-bold text-gray-800">
                                        {{ $antrianSelanjutnya->no_antrian ?? '-' }}
                                    </span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- =========================
        LAYANAN
    ========================== --}}
    <section class="py-20 bg-gray-50">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center max-w-2xl mx-auto">

                <p class="text-sm font-semibold text-red-600 uppercase tracking-wide">
                    Layanan
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900">
                    Layanan Kunjungan
                </h2>

                <p class="mt-4 text-gray-600">
                    Pilih layanan yang sesuai dengan kebutuhan kunjungan Anda.
                </p>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">

                {{-- Service 1 --}}
                <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">

                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">

                        <svg class="w-6 h-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 17v-2a4 4 0 014-4h2a4 4 0 014 4v2m-6-6V7a3 3 0 116 0v4M5 20h14"/>
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-bold text-gray-900">
                        Perpustakaan
                    </h3>

                    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                        Layanan perpustakaan untuk pengunjung yang ingin mengakses koleksi buku dan publikasi BPS.
                    </p>

                </div>


                {{-- Service 2 --}}
                <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">

                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">

                        <svg class="w-6 h-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-bold text-gray-900">
                        Pembelian Produk Statistik Berbayar
                    </h3>

                    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                        Layanan pembelian produk statistik berbayar [Publikasi BPS/Data Mikro/Peta Wilayah Kerja Statistik].
                    </p>

                </div>


                {{-- Service 3 --}}
                <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">

                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">

                        <svg class="w-6 h-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m5-4a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-bold text-gray-900">
                        Akses Produk Statistik pada Website BPS
                    </h3>

                    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                        Layanan Akses Produk Statistik pada Website BPS.
                    </p>

                </div>
                {{-- Service 4 --}}
                <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">

                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">

                        <svg class="w-6 h-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m5-4a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-bold text-gray-900">
                        Konsultasi Statistik
                    </h3>

                    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                        Layanan konsultasi statistik untuk pengunjung.
                    </p>

                </div>
                {{-- Service 5 --}}
                <div class="bg-white rounded-2xl p-7 shadow-sm border border-gray-100">

                    <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center">

                        <svg class="w-6 h-6 text-red-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m5-4a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>

                    </div>

                    <h3 class="mt-5 text-lg font-bold text-gray-900">
                        Rekomendasi Kegiatan Statistik
                    </h3>

                    <p class="mt-2 text-gray-600 text-sm leading-relaxed">
                        Layanan rekomendasi kegiatan statistik untuk pengunjung.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        CARA KUNJUNGAN
    ========================== --}}
    <section class="py-20 bg-white">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="text-center">

                <p class="text-sm font-semibold text-red-600 uppercase tracking-wide">
                    Mudah & Cepat
                </p>

                <h2 class="mt-2 text-3xl font-bold text-gray-900">
                    Cara Melakukan Kunjungan
                </h2>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mt-14">

                <div class="text-center">

                    <div class="mx-auto w-14 h-14 rounded-full bg-red-600 text-white
                                flex items-center justify-center text-lg font-bold">
                        01
                    </div>

                    <h3 class="mt-5 font-bold text-gray-900">
                        Isi Data
                    </h3>

                    <p class="mt-2 text-sm text-gray-600">
                        Lengkapi data diri dan informasi kunjungan.
                    </p>

                </div>


                <div class="text-center">

                    <div class="mx-auto w-14 h-14 rounded-full bg-red-600 text-white
                                flex items-center justify-center text-lg font-bold">
                        02
                    </div>

                    <h3 class="mt-5 font-bold text-gray-900">
                        Pilih Layanan
                    </h3>

                    <p class="mt-2 text-sm text-gray-600">
                        Pilih layanan yang ingin Anda gunakan.
                    </p>

                </div>


                <div class="text-center">

                    <div class="mx-auto w-14 h-14 rounded-full bg-red-600 text-white
                                flex items-center justify-center text-lg font-bold">
                        03
                    </div>

                    <h3 class="mt-5 font-bold text-gray-900">
                        Dapatkan Antrean
                    </h3>

                    <p class="mt-2 text-sm text-gray-600">
                        Sistem akan memberikan nomor antrean.
                    </p>

                </div>


                <div class="text-center">

                    <div class="mx-auto w-14 h-14 rounded-full bg-red-600 text-white
                                flex items-center justify-center text-lg font-bold">
                        04
                    </div>

                    <h3 class="mt-5 font-bold text-gray-900">
                        Tunggu Panggilan
                    </h3>

                    <p class="mt-2 text-sm text-gray-600">
                        Tunggu hingga nomor antrean Anda dipanggil.
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================
        CTA
    ========================== --}}
    <section class="py-16 bg-red-600">

        <div class="max-w-4xl mx-auto px-6 text-center">

            <h2 class="text-3xl md:text-4xl font-bold text-white">
                Siap melakukan kunjungan?
            </h2>

            <p class="mt-4 text-red-100">
                Daftarkan kunjungan Anda dan dapatkan nomor antrean
                dengan mudah.
            </p>

            <a href="{{ route('kunjungan.create') }}"
                    class="inline-flex items-center justify-center px-7 py-3.5
                        bg-red-600 text-white font-semibold rounded-lg
                        hover:bg-red-700 transition shadow-sm">
                 Daftar Kunjungan
            </a>

        </div>

    </section>


    {{-- =========================
        FOOTER
    ========================== --}}
    <footer class="bg-gray-900">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-10">

            <div class="flex flex-col md:flex-row
                        items-center justify-between gap-4">

                <div class="text-center md:text-left">

                    <p class="font-bold text-white">
                        Buku Kunjungan BPS
                    </p>

                    <p class="text-sm text-gray-400 mt-1">
                        Sistem layanan kunjungan dan antrean.
                    </p>

                </div>

                <div class="text-sm text-gray-400">
                    © {{ date('Y') }} Badan Pusat Statistik Kabupaten Sijunjung. All rights reserved.
                </div>

            </div>

        </div>

    </footer>

</body>
</html>
