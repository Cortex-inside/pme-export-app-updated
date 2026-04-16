<?php

namespace PMEexport\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PMEexport\Models\Certificate;
use Maatwebsite\Excel\Concerns\FromCollection;

class CertificatesExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Certificate::all();
    }

    public function map($certificate): array
    {
        return [
            $certificate->uuid,
            $certificate->name,
            $certificate->description,
            optional($certificate->certificateCategory)->name,
        ];
    }


    public function headings(): array
    {
        return [
            'Code',
            'Nome',
            'Descrição',
            'Nome Categoria',
        ];
    }

}
