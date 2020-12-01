<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductDetailModel;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    public function index()
    {
        return response()->json(ProductDetailModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'product_id' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'product_cata_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $product_detail = ProductDetailModel::create($request->all());
        return response()->json($product_detail, 201);
    }

    public function show($id)
    {
        $product_detail = ProductDetailModel::find($id);
        if (is_null($product_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($product_detail, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $product_detail = ProductDetailModel::find($id);
        if (is_null($product_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_detail->update($request->all());
        return response()->json($product_detail, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $product_detail = ProductDetailModel::find($id);
        if (is_null($product_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_detail->delete();
        return response()->json(null, 204);
    }

    public function productColors($product_id)
    {
        $colors = ProductDetailModel::where('product_id', $product_id)->join('colors', 'colors.id', '=', 'color_id')->select('product_details.color_id', 'colors.name')->get();
        return response()->json($colors, 200);
    }

    public function productSizes($product_id)
    {
        $colors = ProductDetailModel::where('product_id', $product_id)->join('sizes', 'sizes.id', '=', 'size_id')->select('product_details.size_id', 'sizes.name')->get();
        return response()->json($colors, 200);
    }
}