<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryConnectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Api-resources

Route::apiResource('/movie', MovieController::class)->missing(function (Request $request) {
    return response()->json([
        "Filmen hittades inte."],
        404);
})->middleware('auth:sanctum');

Route::apiResource('/category', CategoryController::class)->missing(function (Request $request) {
    return response()->json([
        "Kategorin hittades inte."],
        404);
})->middleware('auth:sanctum');

Route::apiResource('/connection', CategoryConnectionController::class)->missing(function (Request $request) {
    return response()->json([
        "Ingen koppling hittades."],
        404);
})->middleware('auth:sanctum');


//Related to accounts
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, "register"])->middleware('guest');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');