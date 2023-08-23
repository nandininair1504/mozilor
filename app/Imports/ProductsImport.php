<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ProductsImport implements ToModel, WithHeadingRow, WithChunkReading, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return Product::updateOrCreate(
                [ 'sku' =>  $row['sku'] ],
                [
                  'name'        => $row['name'],
                  'price'       => $row['price'],
                  'description' => $row['description'],
                ]
        );

    }

    /**
     * get chunk size
     */
    public function chunkSize() : int
    {
        return 500;
    }

    /**
     * unique by
     */
    public function uniqueBy()
    {
        return 'sku';
    }
}
