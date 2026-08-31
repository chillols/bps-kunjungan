//Pekerjaan Lainnya

document.addEventListener('DOMContentLoaded', function () {
    const pekerjaan = document.getElementById('pekerjaan');
    const pekerjaanLainnya = document.getElementById('pekerjaan-lainnya');
    const inputLainnya = document.getElementById('pekerjaan_lainnya');

    if (!pekerjaan) return;

    pekerjaan.addEventListener('change', function () {
        if (this.value === 'Lainnya') {
            pekerjaanLainnya.classList.remove('hidden');
            inputLainnya.required = true;
        } else {
            pekerjaanLainnya.classList.add('hidden');
            inputLainnya.required = false;
            inputLainnya.value = '';
        }
    });
});

//Instansi lainnya

document.addEventListener('DOMContentLoaded', function () {
    const instansi = document.getElementById('instansi');
    const instansiLainnya = document.getElementById('instansi-lainnya');
    const inputLainnya = document.getElementById('instansi_lainnya');

    if (!instansi) return;

    instansi.addEventListener('change', function () {
        if (this.value === 'Lainnya') {
            instansiLainnya.classList.remove('hidden');
            inputLainnya.required = true;
        } else {
            instansiLainnya.classList.add('hidden');
            inputLainnya.required = false;
            inputLainnya.value = '';
        }
    });
});