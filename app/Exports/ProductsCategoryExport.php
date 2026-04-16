<?php

namespace PMEexport\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PMEexport\Models\ProductCategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsCategoryExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductCategory::all();
    }

    public function map($product_uuid): array
    {
        return [
            $product_uuid->uuid,
            $product_uuid->name,
            optional($product_uuid)->photo_url,
        ];
    }


    public function headings(): array
    {
        return [
            'Code',
            'Nome',
            'Foto',
        ];
    }
}
