<aside class="fixed inset-y-0 left-0 z-50 w-64 bg-white border-r border-gray-200">

    <!-- Logo -->
    <div class="flex items-center h-20 px-6 border-b border-gray-200">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            
            <div class="w-10 h-10 flex items-center justify-center">
                <img 
                src="{{ asset('images/logo_bps.png') }}" 
                alt="Logo BPS"
                class="w-10 h-10 object-contain"
                >
            </div>

            <div>
                <h1 class="font-bold text-gray-800">
                    BPS Kunjungan
                </h1>
                <p class="text-xs text-gray-500">
                    Sistem Buku Tamu
                </p>
            </div>

        </a>
    </div>


    <!-- Navigation -->
    <nav class="p-4 space-y-2">

        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg
           {{ request()->routeIs('admin.dashboard')
                ? 'bg-red-50 text-red-600 font-semibold'
                : 'text-gray-600 hover:bg-gray-50' }}">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>

            </svg>

            <span>Dashboard</span>

        </a>


        <!-- Pengunjung -->
        <a href="#"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

            </svg>

            <span>Data Pengunjung</span>

        </a>


        <!-- Antrean -->
        <a href="/admin/daftarantrian"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M8 7h8M8 11h8M8 15h5M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>

            </svg>

            <span>Antrean</span>

        </a>


        <!-- Layanan -->
        <a href="#"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>

            </svg>

            <span>Layanan</span>

        </a>


        <!-- Riwayat -->
        <a href="/admin/riwayatkunjungan"
           class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

            </svg>

            <span>Riwayat Kunjungan</span>

        </a>

    </nav>


    <!-- Bottom -->
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">

        <!-- Admin -->
        <div class="flex items-center gap-3 px-3 py-3 mb-2">

            <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center">
                <span class="text-sm font-semibold text-gray-600">
                    {{ strtoupper(substr(Auth::user()->username, 0, 1)) }}
                </span>
            </div>

            <div class="flex-1 min-w-0">

                <p class="text-sm font-semibold text-gray-800 truncate">
                    {{ Auth::user()->username }}
                </p>

                <p class="text-xs text-gray-500">
                    Administrator
                </p>

            </div>

        </div>


        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg
                           text-gray-600 hover:bg-red-50 hover:text-red-600">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>

                </svg>

                <span>Logout</span>

            </button>

        </form>

    </div>

</aside>