<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImportFormRequest;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function showImport()
    {
        return view('import');
    }

}
