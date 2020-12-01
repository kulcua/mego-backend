<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {
        return response()->json(BrandModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $brand = BrandModel::create($request->all());
        return response()->json($brand, 201);
    }

    public function show($id)
    {
        $brand = BrandModel::find($id);
        if (is_null($brand))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($brand, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $brand = BrandModel::find($id);
        if (is_null($brand))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $brand->update($request->all());
        return response()->json($brand, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $brand = BrandModel::find($id);
        if (is_null($brand))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $brand->delete();
        return response()->json(null, 204);
    }
}