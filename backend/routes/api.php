<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//api for guest to read anything in shop
Route::prefix('guest')->group(function () {
    // Matches The "/guest/brands" URL
    Route::get('brands', [App\Http\Controllers\BrandController::class, 'index']);
    Route::get('colors', [App\Http\Controllers\ColorController::class, 'index']);
    Route::get('genders', [App\Http\Controllers\GenderController::class, 'index']);
    Route::get('models', [App\Http\Controllers\ModelController::class, 'index']);
    Route::get('productcatalogs', [App\Http\Controllers\ProductCatalogController::class, 'index']);
    Route::get('sizes', [App\Http\Controllers\SizeController::class, 'index']);
});

Route::get('product/colors/{product_id}', [App\Http\Controllers\ProductDetailController::class, 'productColors']);
Route::get('product/sizes/{product_id}', [App\Http\Controllers\ProductDetailController::class, 'productSizes']);

Route::get('file/img/{file_name}', [FileController::class, 'getImgByName']);
Route::get('file/img/product/{product_detail_id}', [FileController::class, 'getImgByProductDetailId']);
Route::post('file/img', [FileController::class, 'uploadImg']);
Route::delete('file/img/{id}' , [FileController::class, 'deleteImg']);
Route::delete('file/img/product/{product_detail_id}' , [FileController::class, 'deleteImgByProductDetail']);

//REGION REQUEST LOGIN TO ACCESS
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('login/google', [AuthController::class, 'redirectToProvider']);
Route::get('login/google/callback', [AuthController::class, 'handleProviderCallback']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);

    //with any route that had in Route::apiResouces
    //use Absolute path like App\Http\Controllers\... to avoid err
    Route::get('order/{user_id}', [App\Http\Controllers\OrderController::class, 'orderByUser']);
    Route::get('order_detail/{order_id}', [App\Http\Controllers\OrderDetailController::class, 'detailByOrder']);

    Route::apiResources([
        'roles' => RoleController::class,
        'users' => UserController::class,
        'sizes' => SizeController::class,
        'colors' => ColorController::class,
        'genders' => GenderController::class,
        'models' => ModelController::class,
        'brands' => BrandController::class,
        'product_catalogs' => ProductCatalogController::class,
        'products' => ProductController::class,
        'product_details' => ProductDetailController::class,
        'orders' => OrderController::class,
        'order_details' => OrderDetailController::class
    ]);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });