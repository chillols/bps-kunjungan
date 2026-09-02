<?php

namespace App\Exports;

use App\Models\Queue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class RiwayatKunjunganExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize
{
    protected $tanggal;

    private $rowNumber = 0;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
    }

    public function collection()
    {
        return Queue::with([
            'visitor',
            'service'
        ])
        ->whereHas('visitor', function ($query) {
            $query->whereDate(
                'tanggal_kunjungan',
                $this->tanggal
            );
        })
        ->orderBy('created_at', 'asc')
        ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'No. Antrean',
            'Nama',
            'Instansi',
            'Layanan',
            'Tujuan',
            'Jam',
        ];
    }

    public function map($queue): array
    {
        $this->rowNumber++;

        return [
            $this->rowNumber,
            $queue->no_antrian ?? '-',
            $queue->visitor->nama ?? '-',
            $queue->visitor->instansi ?? '-',
            $queue->service->nama ?? '-',
            $queue->rincian_tujuan ?? '-',

            $queue->visitor->jam_kunjungan
                ? \Carbon\Carbon::parse(
                    $queue->visitor->jam_kunjungan
                )->format('H:i')
                : $queue->created_at->format('H:i'),
        ];
    }
}