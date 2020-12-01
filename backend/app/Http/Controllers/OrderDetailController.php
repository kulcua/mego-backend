<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Validator;

class OrderDetailController extends Controller
{
    public function index()
    {
        $this->authorize('crud-order');
        return response()->json(OrderDetailModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('crud-order');
        $rules = [
            'order_id' => 'required',
            'product_id' => 'required',
            'number' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $order_detail = OrderDetailModel::create($request->all());
        return response()->json($order_detail, 201);
    }

    public function show($id)
    {
        $this->authorize('crud-order');
        $order_detail = OrderDetailModel::find($id);
        if (is_null($order_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($order_detail, 200);
    }

    public function update(Request $request, $id)
    {
        $this->authorize('crud-order');
        $order_detail = OrderDetailModel::find($id);
        if (is_null($order_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $order_detail->update($request->all());
        return response()->json($order_detail, 200);
    }

    public function destroy($id)
    {
        $this->authorize('crud-order');
        $order_detail = OrderDetailModel::find($id);
        if (is_null($order_detail))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $order_detail->delete();
        return response()->json(null, 204);
    }

    public function detailByOrder($order_id)
    {
        $this->authorize('crud-order');
        $order_detail = OrderDetailModel::where('order_id', $order_id)->get();
        if (empty(json_decode($order_detail, true)))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($order_detail, 200);
    }
}