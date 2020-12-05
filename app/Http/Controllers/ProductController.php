<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(ProductModel::with([
            'model' => function ($query)
            {
                $query->with('gender');
            }
            , 'brand',
            'collections' => function ($query)
            {
                $query->with('gender');
            }])->get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
            'brand_id' => 'required',
            'model_id' => 'required',
            'description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $product = ProductModel::create($request->all());
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = ProductModel::find($id)->with([
            'model' => function ($query)
            {
                $query->with('gender');
            }
            , 'brand',
            'collections' => function ($query)
            {
                $query->with('gender');
            }])->get();
        if (is_null($product))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $product = ProductModel::find($id);
        if (is_null($product))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $product = ProductModel::find($id);
        if (is_null($product))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product->delete();
        return response()->json(null, 204);
    }

    public function productsByGender($gender_id)
    {
        $products = ProductModel::find($gender_id)->with([
            'model' => function ($query)
            {
                $query->with('gender');
            }
            , 'brand',
            'collections' => function ($query)
            {
                $query->with('gender');
            }])->get();
        return response()->json($products, 200);
    }

    public function getAllProductWithLowestPrice()
    {
        $products = ProductModel::with(['product_detail' => function ($query) {
            $query->orderBy('price', 'asc');
        }])->whereHas('product_detail')->get();
        return response()->json($products, 200);
    }
}