<?php

namespace App\Exports;

use App\Models\Pesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class PesananExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pesanan::all();

    
    }
    public function map($pesanan):array
        {
            return [
                $pesanan->id,
                $pesanan->user_id,
                $pesanan->tanggal,
                $pesanan->jumlah_harga

            ];
        }

    public function headings(): array
    {
        return [
            'No',
            'User_id',
            'Tanggal',
            'Jumlah_harga'
 
        ];
    }
}

