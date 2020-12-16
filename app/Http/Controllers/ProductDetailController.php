<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductDetailModel;
use App\Models\ProductModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    public function index()
    {
        return response()->json(ProductDetailModel::with('product', 'size', 'color')->get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'product_id' => 'required',
            'price' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }

        $product_color = DB::table('product_color')->where([['product_id', $request->product_id], ['color_id', $request->color_id]])->get();
        if (empty(json_decode($product_color, true)))
        {
            return response()->json('This product has not this color', 200);
        }
        $product_size = DB::table('product_size')->where([['product_id', $request->product_id], ['size_id', $request->size_id]])->get();
        if (empty(json_decode($product_size, true)))
        {
            return response()->json('This product has not this size', 200);
        }

        $product_detail = ProductDetailModel::create($request->all());
        return response()->json($product_detail, 201);
    }

    public function show($id)
    {
        $product_detail = ProductDetailModel::with('product', 'size', 'color')->find($id);
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

    public function detailBySizeColor($product_id, $color_id, $size_id)
    {
        $product_detail = ProductDetailModel::where([
            ['product_id', $product_id], 
            ['color_id', $color_id], 
            ['size_id', $size_id]
            ])->with('size', 'color')->get();
        return response()->json($product_detail, 200);
    }
}