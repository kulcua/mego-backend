<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        return response()->json(RoleModel::get(), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3|max:5',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $role = RoleModel::create($request->all());
        return response()->json($role, 201);
    }

    public function show($id)
    {
        $role = RoleModel::find($id);
        if (is_null($role))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($role, 200);
    }

    public function update(Request $request, $id)
    {
        $role = RoleModel::find($id);
        if (is_null($role))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $role->update($request->all());
        return response()->json($role, 200);
    }

    public function destroy($id)
    {
        $role = RoleModel::find($id);
        if (is_null($role))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $role->delete();
        return response()->json(null, 204);
    }
}