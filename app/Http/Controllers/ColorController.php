<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ColorModel;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    public function index()
    {
        return response()->json(ColorModel::get(), 200);
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
        $color = ColorModel::create($request->all());
        return response()->json($color, 201);
    }

    public function show($id)
    {
        $color = ColorModel::find($id);
        if (is_null($color))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($color, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('admin');
        $color = ColorModel::find($id);
        if (is_null($color))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $color->update($request->all());
        return response()->json($color, 200);
    }

    public function destroy($id)
    {
        $this->authorize('admin');
        $color = ColorModel::find($id);
        if (is_null($color))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $color->delete();
        return response()->json(null, 204);
    }
}