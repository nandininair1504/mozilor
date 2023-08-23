<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImportFormRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Import CSV form
     */
    public function showImport()
    {
        $user = Auth::user();
        return view('import', compact('user'));
    }

}
