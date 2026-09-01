<x-guest-layout>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('kunjungan.store') }}">
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
                <option value="">--Pilih jenis kelamin--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>

            <x-input-error
                :messages="$errors->get('jenis_kelamin')"
                class="mt-2"
            />
        </div>

        <!-- Instansi -->
        <div class="mt-4">
            <x-input-label for="instansi" :value="__('Instansi')" />

            <select
                id="instansi"
                name="instansi"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">--Kategori Instansi--</option>
                <option value="Lembaga Negara">Lembaga Negara</option>
                <option value="Kementrian & Lembaga Pemerintah">Kementrian & Lembaga Pemerintah</option>
                <option value="TNI/POLRI/BIN/Kejaksaan">TNI/POLRI/BIN/Kejaksaan</option>
                <option value="Pemerintah Daerah">Pemerintah Daerah</option>
                <option value="Lembaga Penelitian & Pendidikan">Lembaga Penelitian & Pendidikan</option>
                <option value="BUMN/BUMD">BUMN/BUMD</option>
                <option value="Swasta">Swasta</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <!-- Input Instansi -->
            <div id="instansi-lainnya" class="mt-3 hidden">
            <x-text-input
            id="instansi_lainnya"
            class="block w-full"
            type="text"
            name="instansi_lainnya"
            placeholder="Tuliskan instansi Anda"
        />
            <x-input-error
                :messages="$errors->get('instansi_lainnya')"
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

            <select
                id="pekerjaan"
                name="pekerjaan"
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                required
            >
                <option value="">--Pekerjaan Utama--</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Peneliti/Dosen">Peneliti/Dosen</option>
                <option value="ASN/TNI/POLRI">ASN/TNI/POLRI</option>
                <option value="Pegawai BUMN/BUMD">Pegawai BUMN/BUMD</option>
                <option value="Pegawai Swasta">Pegawai Swasta</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Lainnya">Lainnya</option>
            </select>

            <x-input-error
                :messages="$errors->get('pekerjaan')"
                class="mt-2"
            />
        </div>
         <!-- Input Pekerjaan Lainnya -->
            <div id="pekerjaan-lainnya" class="mt-3 hidden">
            <x-text-input
            id="pekerjaan_lainnya"
            class="block w-full"
            type="text"
            name="pekerjaan_lainnya"
            placeholder="Tuliskan pekerjaan Anda"
        />

        <x-input-error
            :messages="$errors->get('pekerjaan_lainnya')"
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
                <option value="">--Pilih tujuan kunjungan--</option>
                <option value="Perpustakaan">Perpustakaan</option>
                <option value="Pembelian Produk Statistik Berbayar">Pembelian Produk Statistik Berbayar</option>
                <option value="Akses Produk Statistik pada Website BPS">Akses Produk Statistik pada Website BPS</option>
                <option value="Konsultasi Statistik">Konsultasi Statistik</option>
                <option value="Rekomendasi Kegiatan Statistik">Rekomendasi Kegiatan Statistik</option>
                <option value="Keperluan Lainnya">Keperluan Lainnya</option>
            </select>

            <x-input-error
                :messages="$errors->get('tujuan')"
                class="mt-2"
            />
        </div>
        <!-- Rincian Tujuan -->
        <div class="mt-4">
            <x-input-label for="rincian_tujuan" :value="__('Rincian Tujuan')" />

            <x-text-input
                id="rincian_tujuan"
                class="block mt-1 w-full"
                type="text"
                name="rincian_tujuan"
                :value="old('rincian_tujuan')"
                placeholder="Masukkan rincian tujuan"
                required
            />

            <x-input-error
                :messages="$errors->get('rincian_tujuan')"
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
