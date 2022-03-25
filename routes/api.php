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

Route::get("recipe", [receptAPI::class, "getAllRecipe"]);
Route::get("recipe/{id}", [receptAPI::class, "getRecipe"]);
Route::post("recipe", [receptAPI::class, "createRecipe"]);
Route::put("recipe/{id}", [receptAPI::class, "updateRecipe"]);
Route::delete("recipe/{id}", [receptAPI::class, "deleteRecipe"]);
