<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BPS Kunjungan') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex items-center justify-center px-4 py-8">

        <!-- LOGIN CARD -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg px-8 py-8">

            <!-- LOGO -->
            <div class="text-center mb-8">

                <img
                    src="{{ asset('images/logo_bps.png') }}"
                    alt="Logo BPS"
                    class="mx-auto h-36 w-auto object-contain mb-1"
                >
                <h1 class="text-xl font-semibold text-gray-800">
                    LOGIN ADMINISTRATOR
                </h1>
            </div>

            <!-- CONTENT LOGIN -->
            {{ $slot }}

        </div>

    </div>

</body>

</html>