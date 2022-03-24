<?php

use App\Http\Controllers\receptAPI;
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

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
});

Route::get("recept", [receptAPI::class, "getAllRecipe"]);
Route::get("recept/{id}", [receptAPI::class, "getRecipe"]);
Route::post("recept", [receptAPI::class, "createRecipe"]);
Route::put("recept/{id}", [receptAPI::class, "updateRecipe"]);
Route::delete("recept/{id}", [receptAPI::class, "deleteRecipe"]);
