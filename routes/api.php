<?php

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartPageController;
use App\Http\Controllers\Api\CommonApiController;
use App\Http\Controllers\Api\AlgoliaApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/* -------------------------------------------------------------------------- */
/*                                common routes                               */
/* -------------------------------------------------------------------------- */

/* ----------------------------- products routes ---------------------------- */

Route::get('/products/{sorting?}/{min?}/{max?}/{category?}', [CommonApiController::class, 'products'])->name('api.common.products');

// algolia search

Route::get('/search/', [AlgoliaApiController::class, 'search'])->name('api.common.search');