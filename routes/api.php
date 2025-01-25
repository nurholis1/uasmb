<?php
use App\Http\Controllers\Api\UasmbController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::resource('/uasmb', UasmbController::class);