<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomepageController extends Controller
{
    /**
     * Homepage
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::select('name', 'sku', 'price')
                    ->orderBy('created_at', 'desc')
                    ->get()
                    ->toArray();

        return view('homepage', compact('products', 'user'));
    }
}
