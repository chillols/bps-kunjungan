<x-guest-layout>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="#">
        @csrf

        <!-- Tanggal Kunjungan -->
        <div>
            <x-input-label for="tanggal_kunjungan" :value="__('Tanggal Kunjungan')" />

            <x-text-input
                id="tanggal_kunjungan"
                class="block mt-1 w-full"
                type="date"
                name="tanggal_kunjungan"
                :value="old('tanggal_kunjungan')"
                required
            />

            <x-input-error
                :messages="$errors->get('tanggal_kunjungan')"
                class="mt-2"
            />
        </div>

        <!-- Jam Kunjungan -->
        <div class="mt-4">
            <x-input-label for="jam_kunjungan" :value="__('Jam Kunjungan')" />

            <x-text-input
                id="jam_kunjungan"
                class="block mt-1 w-full"
                type="time"
                name="jam_kunjungan"
                :value="old('jam_kunjungan')"
                required
            />

            <x-input-error
                :messages="$errors->get('jam_kunjungan')"
                class="mt-2"
            />
        </div>

        <!-- Nama Lengkap -->
        <div class="mt-4">
            <x-input-label for="nama" :value="__('Nama Lengkap')" />

            <x-text-input
                id="nama"
                class="block mt-1 w-full"
                type="text"
                name="nama"
                :value="old('nama')"
                required
                placeholder="Masukkan nama lengkap"
            />

            <x-input-error
                :messages="$errors->get('nama')"
                class="mt-2"
            />
        </div>

        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />

            <select
                id="jenis_kelamin"
                name="jenis_kelamin"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">Pilih jenis kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>

            <x-input-error
                :messages="$errors->get('jenis_kelamin')"
                class="mt-2"
            />
        </div>

        <!-- Instansi -->
        <div class="mt-4">
            <x-input-label for="instansi" :value="__('Instansi')" />

            <x-text-input
                id="instansi"
                class="block mt-1 w-full"
                type="text"
                name="instansi"
                :value="old('instansi')"
                placeholder="Masukkan nama instansi"
            />

            <x-input-error
                :messages="$errors->get('instansi')"
                class="mt-2"
            />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />

            <textarea
                id="alamat"
                name="alamat"
                rows="3"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Masukkan alamat"
                required
            >{{ old('alamat') }}</textarea>

            <x-input-error
                :messages="$errors->get('alamat')"
                class="mt-2"
            />
        </div>

        <!-- No HP -->
        <div class="mt-4">
            <x-input-label for="no_hp" :value="__('No. HP')" />

            <x-text-input
                id="no_hp"
                class="block mt-1 w-full"
                type="tel"
                name="no_hp"
                :value="old('no_hp')"
                placeholder="Contoh: 081234567890"
                required
            />

            <x-input-error
                :messages="$errors->get('no_hp')"
                class="mt-2"
            />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Contoh: nama@email.com"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />
        </div>

        <!-- Pekerjaan -->
        <div class="mt-4">
            <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />

            <x-text-input
                id="pekerjaan"
                class="block mt-1 w-full"
                type="text"
                name="pekerjaan"
                :value="old('pekerjaan')"
                placeholder="Masukkan pekerjaan"
                required
            />

            <x-input-error
                :messages="$errors->get('pekerjaan')"
                class="mt-2"
            />
        </div>

        <!-- Tujuan -->
        <div class="mt-4">
            <x-input-label for="tujuan" :value="__('Tujuan Kunjungan')" />

            <select
                id="tujuan"
                name="tujuan"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">Pilih tujuan kunjungan</option>
                <option value="Konsultasi Data">Konsultasi Data</option>
                <option value="Permintaan Data">Permintaan Data</option>
                <option value="Konsultasi Statistik">Konsultasi Statistik</option>
                <option value="Pelayanan Administrasi">Pelayanan Administrasi</option>
                <option value="Keperluan Lainnya">Keperluan Lainnya</option>
            </select>

            <x-input-error
                :messages="$errors->get('tujuan')"
                class="mt-2"
            />
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center py-3">
                DAFTAR KUNJUNGAN
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>
