<?php

namespace App\Http\Controllers;

use App\Models\BannerImageModel;
use App\Models\ProductImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

// $googleDriveStorage = Storage::disk('google');
// $dirBanner = '/1XSaFHzV4lFrx-mGR3GmtWTwxmPLauZXn';
// $recursive = false;
// $contents = collect($googleDriveStorage->listContents($dirBanner, $recursive));

class FileController extends Controller
{
    public function getAllDataProductImg()
    {
        return response()->json(ProductImageModel::get(), 200);
    }

    public function getAllDataBannerImg()
    {
        return response()->json(BannerImageModel::orderByRaw('priority ASC')->get(), 200);
    }

    public function getImgByProductDetailId($product_detail_id)
    {
        $image = ProductImageModel::where('product_detail_id', $product_detail_id)->first();

        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('name', $image->name)
            ->first();

        $contents = $googleDriveStorage->get($fileinfo['path']);

        return response($contents)
            ->header('Content-Type', $fileinfo['mimetype'])
            ->header('Content-Disposition', "attachment; filename='" . $fileinfo['name'] . "'");
    }

    public function getImgByPriority($priority)
    {
        //can get only 1 image with 1 product_detail_id
        $image = BannerImageModel::where('priority', $priority)->first();

        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('name', $image->name)
            ->first();

        $contents = $googleDriveStorage->get($fileinfo['path']);

        return response($contents)
            ->header('Content-Type', $fileinfo['mimetype'])
            ->header('Content-Disposition', "attachment; filename='" . $fileinfo['name'] . "'");
    }

    public function uploadProductImg(Request $request)
    {
        //1. storage image in file system public/img/..
        $path = $request->file('photo')->store('', 'google');

        //2. save link image in database
        $image = new ProductImageModel();
        $image->name = $path;
        $image->origin_name = $request->file('photo')->getClientOriginalName();
        $image->product_detail_id = $request->product_detail_id;
        $image->save();

        return response()->json(['upload success ' . $path], 200);
    }

    public function uploadBannerImg(Request $request)
    {
        //1. storage image in file system public/img/..
        $path = $request->file('photo')->store('', 'google');

        //2. save link image in database
        $image = new BannerImageModel();
        $image->name = $path;
        $image->origin_name = $request->file('photo')->getClientOriginalName();
        $image->priority = $request->priority;
        $image->save();

        return response()->json(['upload success ' . $path], 200);
    }

    public function deleteProductImgById($id)
    {
        $image = ProductImageModel::find($id);

        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('type', 'file')
            ->where('name', $image->name)
            ->first();
        
        $googleDriveStorage->delete($fileinfo['path']);

        //delete file name in database
        $image->delete();

        return response()->json(['Deleted image name: '.$image->name.' where id = '.$id], 200);
    }

    public function deleteBannerImgById($id)
    {
        $image = BannerImageModel::find($id);

        if (empty(json_decode($image, true))) {
            return response()->json(["message" => "ID Not Found"], 404);
        }

        $googleDriveStorage = Storage::disk('google');

        $fileinfo = collect($googleDriveStorage->listContents('/', false))
            ->where('type', 'file')
            ->where('name', $image->name)
            ->first();
        
        $googleDriveStorage->delete($fileinfo['path']);

        //delete file name in database
        $image->delete();

        return response()->json(['Deleted banner image name: '.$image->name.' where id = '.$id], 200);
    }
}
