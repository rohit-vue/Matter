<?php

namespace App\Http\Controllers;

use App\Models\ProductDevSeason;
use Illuminate\Http\Request;

class ProductDevelopmentController extends Controller
{
    public function index()
    {
        $products = ProductDevSeason::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = ProductDevSeason::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = ProductDevSeason::find($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = ProductDevSeason::find($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        $product = ProductDevSeason::find($id);
        $product->delete();
        return response()->json(null, 204);
    }
}
