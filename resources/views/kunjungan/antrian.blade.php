<x-guest-layout>

    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />
<div class="row d-flex justify-content-center h-100">
    <div class="col-md-12 mt-5 d-flex justify-content-center align-items-center">
        <div class="row box-data rounded mx-auto d-flex justify-content-center mt-2">
           <div class="row box-nomor d-flex justify-content-center align-items-center">
            Nomor Antrian Anda
           </div>
           <div class="row text-box1 d-flex justify-content-center mt-4 ">
            {{ $no_antrian }}
           </div>
        <div class="row text-boxall ms-3 ">
            Nama
        </div>
        <div class="row text-boxall ms-3 ">
            {{ $nama }}
        </div>
        <div class="row text-boxall ms-3">
            Tanggal: {{ $tanggal }}
        </div>
        <div class="row text-boxall ms-3 mb-3">
            Waktu:
        </div>
        <div class="row text-boxall1 d-flex justify-content-center ms-3">
            Silahkan menunggu nomor antrian Anda dipanggil oleh petugas
        </div>
        <div class="row text-boxall1 d-flex justify-content-center ms-3">
            Silahkan menunggu nomor antrian
        </div>
        <div class="row text-boxall1 d-flex justify-content-center ms-3">
            Nomor ini hanya berlaku pada
        </div>
        <div class="row text-boxall1 d-flex justify-content-center ms-3">
            hari pendaftaran antrian
        </div>
    </div>
</div>
</x-guest-layout>