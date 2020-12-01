<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ModelModel;
use Illuminate\Support\Facades\Validator;

class ModelController extends Controller
{
    public function index()
    {
        return response()->json(ModelModel::get(), 200);
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
        $model = ModelModel::create($request->all());
        return response()->json($model, 201);
    }

    public function show($id)
    {
        $model = ModelModel::find($id);
        if (is_null($model))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($model, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $model = ModelModel::find($id);
        if (is_null($model))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $model->update($request->all());
        return response()->json($model, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $model = ModelModel::find($id);
        if (is_null($model))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $model->delete();
        return response()->json(null, 204);
    }
}