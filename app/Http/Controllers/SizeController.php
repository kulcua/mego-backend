<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SizeModel;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        return response()->json(SizeModel::get(), 200);
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
        $size = SizeModel::create($request->all());
        return response()->json($size, 201);
    }

    public function show($id)
    {
        $size = SizeModel::find($id);
        if (is_null($size))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($size, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $size = SizeModel::find($id);
        if (is_null($size))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $size->update($request->all());
        return response()->json($size, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $size = SizeModel::find($id);
        if (is_null($size))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $size->delete();
        return response()->json(null, 204);
    }
}