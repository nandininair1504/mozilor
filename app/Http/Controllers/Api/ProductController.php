<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class ProductController extends BaseController
{
    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt'
        ]);

        if($validator->fails())
        {
            return $this->respondError('Validation Error.', $validator->errors());
        }

        $inputs = $request->all();
        $csvFile = $request->file('csv_file');

        if(Excel::import(new ProductsImport, $csvFile)) {
            return $this->respondSuccess($inputs, 'Import successful');
        }else{
            return $this->respondError($inputs, 'Oops, something wrong with the import process');
        }

    }
}
