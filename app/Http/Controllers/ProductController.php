<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
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

    public function productsByGender($gender_id, Request $request)
    {
        $param = $request->all();
        $products = ProductModel::find($gender_id)->with([
            'model' => function ($query)
            {
                $query->with('gender');
            }
            , 'brand',
            'collections' => function ($query)
            {
                $query->with('gender');
            }])->filter($param)->get();
        return response()->json($products, 200);
    }

    public function getAllProductWithLowestPrice(Request $request)
    {
        $param = $request->all();

        $products = ProductModel::with(['product_detail_min_price'
         => function ($query) {
            $query->orderBy('price', 'asc');
        }])
        ->whereHas('product_detail_min_price')->filter($param)->get();
        return response()->json($products, 200);
    }

    public function productColors($product_id){
        $colors = ProductModel::where('id', $product_id)->with(['colors' => function ($query) use ($product_id) {
            $query->where('product_id', $product_id);
        }])->first()->colors;
        return response()->json($colors, 200); 
    }

    public function productSizes($product_id){
        $sizes = ProductModel::where('id', $product_id)->with(['sizes' => function ($query) use ($product_id) {
            $query->where('product_id', $product_id);
        }])->first()->sizes;
        return response()->json($sizes, 200); 
    }

    public function colorForProduct(Request $request){
        $this->authorize('admin');
        $rules = [
            'product_id' => 'required|numeric',
            'color_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        try {
            DB::table('product_color')->insert($request->all());

            return response()->json('Successful', 201);
        }
        catch (Exception $e) {
            return response()->json('Data exists', 200);
        }
    }

    public function sizeForProduct(Request $request){
        $this->authorize('admin');
        $rules = [
            'product_id' => 'required|numeric',
            'size_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        try {
            DB::table('product_size')->insert($request->all());

            return response()->json('Successful', 201);
        }
        catch (Exception $e) {
            return response()->json('Data exists', 200);
        }
    }
}