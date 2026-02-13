<?php
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('movie', MovieController::class)->missing(function (Request $request) {
    return response()->json([
        "Filmen hittades inte."],
        404);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
