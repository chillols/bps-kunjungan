<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'BPS Kunjungan') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.navigation')

        {{-- Main Content --}}
        <main class="ml-64 min-h-screen">

            {{-- Top Header --}}
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8">

                <div>
                    <h1 class="text-xl font-semibold text-gray-800">
                        @yield('title', 'Dashboard')
                    </h1>

                    <p class="text-sm text-gray-500">
                        Sistem Buku Kunjungan BPS
                    </p>
                </div>

                <div class="text-sm text-gray-500">
                    {{ now()->format('d F Y') }}
                </div>

            </header>


            {{-- Page Content --}}
            <div class="p-8">

                @yield('content')

            </div>

        </main>

    </div>

</body>
</html>