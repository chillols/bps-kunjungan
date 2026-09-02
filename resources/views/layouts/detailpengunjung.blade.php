<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', 'Detail Pengunjung')
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <!-- KARTU UTAMA -->
        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- HEADER -->
            <div class="px-8 pt-8 pb-6 text-center">

                <!-- LOGO -->
                <img
                    src="{{ asset('images/logo_bps.png') }}"
                    alt="Logo BPS"
                    class="mx-auto h-20 w-20 object-contain"
                >

                <h1 class="mt-5 text-2xl font-bold text-gray-800">
                    Sistem Kunjungan BPS
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Detail Pengunjung
                </p>

            </div>

            <!-- CONTENT -->
            <div class="px-8 pb-8">

                @yield('content')

            </div>

            <!-- FOOTER -->
            <div class="border-t border-gray-100 bg-gray-50 px-6 py-4 text-center">

                <p class="text-xs text-gray-500">
                    Badan Pusat Statistik Kabupaten Sijunjung.
                </p>

            </div>

        </div>

    </div>

</body>

</html>