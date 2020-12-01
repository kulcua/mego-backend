<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GenderModel;
use Illuminate\Support\Facades\Validator;

class GenderController extends Controller
{
    public function index()
    {
        return response()->json(GenderModel::get(), 200);
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
        $gender = GenderModel::create($request->all());
        return response()->json($gender, 201);
    }

    public function show($id)
    {
        $gender = GenderModel::find($id);
        if (is_null($gender))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($gender, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $gender = GenderModel::find($id);
        if (is_null($gender))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $gender->update($request->all());
        return response()->json($gender, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $gender = GenderModel::find($id);
        if (is_null($gender))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $gender->delete();
        return response()->json(null, 204);
    }
}