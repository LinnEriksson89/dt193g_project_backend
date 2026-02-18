<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryConnectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('movie', MovieController::class)->missing(function (Request $request) {
    return response()->json([
        "Filmen hittades inte."],
        404);
});

Route::apiResource('category', CategoryController::class)->missing(function (Request $request) {
    return response()->json([
        "Kategorin hittades inte."],
        404);
});

Route::apiResource('connection', CategoryConnectionController::class)->missing(function (Request $request) {
    return response()->json([
        "Ingen koppling hittades."],
        404);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
