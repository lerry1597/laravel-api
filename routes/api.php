<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductViewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'version' => app()->version()
    ]);
});

Route::prefix('product')->group(function () {
    Route::post('/create', [ProductController::class, 'CreateProduct']);
    Route::put('/update/{id}', [ProductController::class, 'UpdateProduct']);
    Route::delete('/delete/{id}', [ProductController::class, 'DeleteProduct']);

    Route::get('/view', [ProductViewController::class, 'ViewAllProduct']);
    Route::get('/view/detail/{id}', [ProductViewController::class, 'ViewDetailsProduct']);
});

Route::prefix('type')->group(function () {
    Route::post('/create', [ProductTypeController::class, 'CreateProductType']);
    Route::put('/update/{id}', [ProductTypeController::class, 'UpdateProductType']);
    Route::delete('/delete/{id}', [ProductTypeController::class, 'DeleteProductType']);
});




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
