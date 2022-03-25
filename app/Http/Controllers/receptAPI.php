<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class receptAPI extends Controller
{
    public function getAllRecipe()
    {
        $recipes = Recipe::get()->toJson(JSON_PRETTY_PRINT);
        return response($recipes, 200);
    }

    public function createRecipe(request $request)
    {
        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->category = $request->category;
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
    public function getRecipe($id)
    {
        if (Recipe::where("id", $id)->exists()) {
            $recipe = Recipe::where("id", $id)
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
