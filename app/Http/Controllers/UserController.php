<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return response()->json(UserModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'user_id' => 'required',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $user = UserModel::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $this->authorize('admin');
        $user = UserModel::find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $user = UserModel::find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $user = UserModel::find($id);
        if (is_null($user))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}