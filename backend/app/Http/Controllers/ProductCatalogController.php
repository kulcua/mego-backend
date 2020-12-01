<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductCatalogModel;
use Illuminate\Support\Facades\Validator;

class ProductCatalogController extends Controller
{
    public function index()
    {
        return response()->json(ProductCatalogModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
            'gender_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $product_cata = ProductCatalogModel::create($request->all());
        return response()->json($product_cata, 201);
    }

    public function show($id)
    {
        $product_cata = ProductCatalogModel::find($id);
        if (is_null($product_cata))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($product_cata, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $product_cata = ProductCatalogModel::find($id);
        if (is_null($product_cata))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_cata->update($request->all());
        return response()->json($product_cata, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $product_cata = ProductCatalogModel::find($id);
        if (is_null($product_cata))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_cata->delete();
        return response()->json(null, 204);
    }
}