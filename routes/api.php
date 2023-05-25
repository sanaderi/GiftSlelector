<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Gift route section
Route::get('/gifts',[GiftController::class,'index'])->name('gifts.index');//Gift list
Route::get('/gifts/{id}', [GiftController::class,'show'])->name('gifts.show');//Gift info
Route::get('/gifts_by_extra', [GiftController::class,'showByExtra'])->name('gifts.extra_info');//Gift info

//End gift route section
