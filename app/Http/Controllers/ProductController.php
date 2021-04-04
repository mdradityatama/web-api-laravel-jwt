<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseAPI;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return response()->json($product);
    }

    public function store(Request $request)
    {
        try
        {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
        }
        catch (\Throwable $e)
        {
            return response()->json($e);
        }

        return response()->json(
            [
                'success' => true,
                'data' => $product
            ]
        );
    }
}
