<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return response()->json(OrderModel::get(), 200);
    }

    public function store(Request $request)
    {
        $this->authorize('crud-order');
        $rules = [
            'user_id' => 'required',
            'address' => 'required',
            'total_amount' => 'required',
            'status' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 400);
        }
        $order = OrderModel::create($request->all());
        return response()->json($order, 201);
    }

    public function show($id)
    {   
        $order = OrderModel::find($id);

        //only customer can view their order
        $this->authorize($order, 'view');
        
        if (is_null($order))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($order, 200);
    }
    
    public function update(Request $request, $id)
    {
        $this->authorize('crud-order');
        $order = OrderModel::find($id);
        if (is_null($order))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function destroy($id)
    {
        $this->authorize('crud-order');
        $order = OrderModel::find($id);
        if (is_null($order))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        $order->delete();
        return response()->json(null, 204);
    }

    public function orderByUser($user_id)
    {
        $this->authorize('crud-order');
        $order = OrderModel::where('user_id', $user_id)->get();
        if (empty(json_decode($order, true)))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        return response()->json($order, 200);
    }
}