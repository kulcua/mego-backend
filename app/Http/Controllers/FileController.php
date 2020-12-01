<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getImgByName($fileName)
    {
        return response()->download(public_path('img/'.$fileName));
    }

    public function getImgByProductDetailId($product_detail_id)
    {
        //can get only 1 image with 1 product_detail_id
        $list_image = ImageModel::where('product_detail_id', $product_detail_id)->get();
        return response()->download(public_path('img/'.$list_image->first()->name));
    }

    public function uploadImg(Request $request)
    {
        $fileName = Str::random(10).'.png';

        //1. save link image in database
        $image = new ImageModel();
        $image->name = $fileName;
        $image->origin_name = $request->file('photo')->getClientOriginalName();
        $image->product_detail_id = $request->product_detail_id;
        $image->save();

        //2. storage image in file system public/img/..
        $path = $request->file('photo')->move(public_path('/img'), $fileName);
        $photoURL = url('/'.$fileName);

        return response()->json(['url: ', $photoURL], 200);
    }

    public function deleteImg($id)
    {
        $image = ImageModel::find($id);
        
        if (is_null($image))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        //delete file in folder
        if(Storage::disk('local_public')->exists($image->name)){
            Storage::disk('local_public')->delete($image->name);
        }

        //delete fil name in database
        $image->delete();

        return response()->json(['Deleted'], 200);
    }

    public function deleteImgByProductDetail($product_detail_id)
    {
        $image = ImageModel::where('product_detail_id', $product_detail_id)->get();
        
        //check image in database
        if (empty(json_decode($image, true)))
        {
            return response()->json(["message" => "ID Not Found"], 404);
        }
        
        //delete file in folder
        if(Storage::disk('local_public')->exists($image->name)){
            Storage::disk('local_public')->delete($image->name);
        }
        else return response()->json(["message" => "Image Not Found"], 404);

        //delete fil name in database
        $image->delete();

        return response()->json(['Deleted'], 200);
    }
}