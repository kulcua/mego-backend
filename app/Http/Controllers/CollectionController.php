<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CollectionModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class CollectionController extends Controller
{
    public function index()
    {
        return response()->json(CollectionModel::with('gender')->get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
            'gender_id' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $product_cata = CollectionModel::create($request->all());
        return response()->json($product_cata, 201);
    }

    public function show($id)
    {
        $product_cata = CollectionModel::with('gender')->find($id);
        if (is_null($product_cata)) {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($product_cata, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $product_cata = CollectionModel::find($id);
        if (is_null($product_cata)) {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_cata->update($request->all());
        return response()->json($product_cata, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $product_cata = CollectionModel::find($id);
        if (is_null($product_cata)) {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $product_cata->delete();
        return response()->json(null, 204);
    }

    public function collectionProductsLowestPriceFilterBrandModel(Request $request)
    {
        $param = $request->all();
        //get all products in a collection
        $products = CollectionModel::where('id', $request->collection_id)->whereHas('products', function (Builder $builder) use ($param) {
            $builder->filter($param);
        })->with([
            'products' => function($builder) use ($param) 
            { 
                $builder->whereHas('product_detail_min_price')->filter($param)->with(['product_detail_min_price' => function ($q){
                    $q->orderBy('price', 'asc');
                }
                ]); 
            }
            ])->get();

        return response()->json($products, 200);
    }

    public function collectionsByGender($gender_id)
    {
        $collections = CollectionModel::where('gender_id', $gender_id)->with('gender')->get();
        return response()->json($collections, 200);
    }
}