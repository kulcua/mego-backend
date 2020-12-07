<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProductController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//api for guest to read anything in shop
Route::prefix('guest')->group(function () {
    //API SHOW FOR GUEST
    // Matches The "/guest/brands" URL
    Route::get('brands', [App\Http\Controllers\BrandController::class, 'index']);
    Route::get('colors', [App\Http\Controllers\ColorController::class, 'index']);
    Route::get('genders', [App\Http\Controllers\GenderController::class, 'index']);
    Route::get('models', [App\Http\Controllers\ModelController::class, 'index']);
    Route::get('collections', [App\Http\Controllers\CollectionController::class, 'index']);
    Route::get('sizes', [App\Http\Controllers\SizeController::class, 'index']);
    Route::get('products', [App\Http\Controllers\ProductController::class, 'index']);
    Route::get('product_details', [App\Http\Controllers\ProductDetailController::class, 'index']);

    Route::get('brands/{id}', [App\Http\Controllers\BrandController::class, 'show']);
    Route::get('colors/{id}', [App\Http\Controllers\ColorController::class, 'show']);
    Route::get('genders/{id}', [App\Http\Controllers\GenderController::class, 'show']);
    Route::get('models/{id}', [App\Http\Controllers\ModelController::class, 'show']);
    Route::get('collections/{id}', [App\Http\Controllers\CollectionControllers::class, 'show']);
    Route::get('sizes/{id}', [App\Http\Controllers\SizeController::class, 'show']);
    Route::get('products/{id}', [App\Http\Controllers\ProductController::class, 'show']);
    Route::get('product_details/{id}', [App\Http\Controllers\ProductDetailController::class, 'show']);
    //DONE API SHOW ALL FOR GUEST

    //get all colors and sizes of a product
    Route::get('product/colors/{product_id}', [App\Http\Controllers\ProductController::class, 'productColors']);
    Route::get('product/sizes/{product_id}', [App\Http\Controllers\ProductController::class, 'productSizes']);

    //get product detail by color and size
    Route::get('product_detail/product/{product_id}/color/{color_id}/size/{size_id}', [App\Http\Controllers\ProductDetailController::class, 'detailBySizeColor']);

    //get all products of a collection
    Route::get('collection/products/{collection_id}', [App\Http\Controllers\CollectionController::class, 'collectionProducts']);

    //get a product detail with lowest price
    Route::get('products/detail/lowest', [App\Http\Controllers\ProductController::class, 'getAllProductWithLowestPrice']);

    //get models and collections by gender
    Route::get('models/gender/{gender_id}', [App\Http\Controllers\ModelController::class, 'modelsByGender']);
    Route::get('collections/gender/{gender_id}', [App\Http\Controllers\CollectionController::class, 'collectionsByGender']);

    //get all products by gender
    Route::get('products/gender/{gender_id}', [App\Http\Controllers\ProductController::class, 'productsByGender']);
});

Route::prefix('image')->group(function () {
    Route::get('products', [FileController::class, 'getAllDataProductImg']);
    Route::get('banners', [FileController::class, 'getAllDataBannerImg']);

    Route::get('{file_name}', [FileController::class, 'getImgByName']);

    Route::get('product/{product_detail_id}', [FileController::class, 'getImgByProductDetailId']);
    Route::get('banner/{priority}', [FileController::class, 'getImgByPriority']);

    Route::post('product', [FileController::class, 'uploadProductImg']);
    Route::post('banner', [FileController::class, 'uploadBannerImg']);

    Route::delete('product/{id}' , [FileController::class, 'deleteProductImgById']);
    Route::delete('product/{product_detail_id}' , [FileController::class, 'deleteProductImgByProductDetail']);

    Route::delete('banner/{id}' , [FileController::class, 'deleteBannerImgById']);
});

//REGION REQUEST LOGIN TO ACCESS
Route::post('register', [AuthController::class, 'register']);
//route login define to redirect when user has not login
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('login/google', [AuthController::class, 'redirectToProvider']);
Route::get('login/google/callback', [AuthController::class, 'handleProviderCallback']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);

    //insert color to product
    Route::post('product/color', [ProductController::class, 'colorForProduct']);
    //insert size to product
    Route::post('product/size', [ProductController::class, 'sizeForProduct']);

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
        'collections' => CollectionController::class,
        'products' => ProductController::class,
        'product_details' => ProductDetailController::class,
        'orders' => OrderController::class,
        'order_details' => OrderDetailController::class
    ]);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });