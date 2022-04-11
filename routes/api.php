<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\UserListController;
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

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('tasks', TaskController::class);

    
});

Route::middleware("auth:sanctum")->get("/user", function (Request $request) {
    return $request->user();
    
    
});
Route::get("/recipe", [receptAPI::class, "getAllRecipe"]);
Route::get("get-recipe/{user_list_id}", [receptAPI::class, "getRecipe"]);
Route::post("add-recipe/{id}", [receptAPI::class, "addRecipe"]);
Route::put("update-recipe/{id}", [receptAPI::class, "updateRecipe"]);
Route::delete("recipe/{id}", [receptAPI::class, "deleteRecipe"]);

Route::post("create-userlist/{id}", [UserListController::class, "createList"]);
Route::delete("delete-userlist/{id}", [UserListController::class, "deleteList"]);
Route::get("userlist/{id}", [UserListController::class, "getList"]);


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


