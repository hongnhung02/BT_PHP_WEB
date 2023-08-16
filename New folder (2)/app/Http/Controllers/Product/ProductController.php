<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product = null) {
        $this->product = $product;
    }

    public function index($slug)
    {
        $product = $this->product->where('slug', $slug)->first();
        return view('product.index', [
            'product' => $product,
        ]);
    }
}
