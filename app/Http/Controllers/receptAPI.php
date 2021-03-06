<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class receptAPI extends Controller
{
    public function getAllRecipe()
    {
        $recepts = Recipe::get()->toJson(JSON_PRETTY_PRINT);
        return response($recepts, 200);
    }


    public function addRecipe(request $request, $id)
    {
        $recipe = new Recipe();
        $recipe->recipe = $request->recipe;
        $recipe->image = $request->image;
        $recipe->recipe_id = $request->recipe_id;
        $recipe->user_list_id = $request->user_list_id;
        $recipe->save();

        return response()->json(
            [
                "message" => "Recipe record has been created",
            ],
            201
        );
    }

    public function updateRecipe(Request $request, $id)
    {
        if (Recipe::where("id", $id)->exists()) {
            $recipe = Recipe::find($id);
            $recipe->name = is_null($request->name)
                ? $recipe->name
                : $request->name;
            $recipe->category = is_null($request->category)
                ? $recipe->category
                : $request->category;
            $recipe->save();

            return response()->json(
                [
                    "message" => "Recipe records updated successfully",
                ],
                200
            );
        } else {
            return response()->json(
                [
                    "message" => "Recipe not found",
                ],
                404
            );
        }
    }
    public function getRecipe($user_list_id)
    {
        if (Recipe::where("user_list_id", $user_list_id)->exists()) {
            $recipe = Recipe::where('user_list_id', $user_list_id)
                ->get()
                ->toJson(JSON_PRETTY_PRINT);
            return response($recipe, 200);
        } else {
            return response()->json(
                [
                    "message" => "Recipe not found",
                ],
                404
            );
        }
        /* if (Recipe::where("id", $id)->exists()) {
            $recipe = Recipe::where("image", $image);
            $recipe = Recipe::where("recipe_id", $recipe_id);
            $recipe = Recipe::where("user_list_id", $user_list_id)
                ->get()
                ->toJson(JSON_PRETTY_PRINT);
            return response($recipe, 200);
        } else {
            return response()->json(
                [
                    "message" => "Recipe not found",
                ],
                404
            );
        } */
    }

    public function deleteRecipe($id)
    {
        if (Recipe::where("id", $id)->exists()) {
            $recipe = Recipe::find($id);
            $recipe->delete();

            return response()->json(
                [
                    "message" => "Recipe records deleted",
                ],
                202
            );
        } else {
            return response()->json(
                [
                    "message" => "Recipe not found",
                ],
                404
            );
        }
    }
}
