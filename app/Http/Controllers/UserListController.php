<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    // Create list
    public function createList(request $request, $id) {

        $user_lists = new UserList();
        $user_lists->title = $request->title;
        $user_lists->user_id = $id;
        $user_lists->save();

        return response()->json(
            [
                "message" => "List has been created",
            ],
            201
        );
    }
    

    // getlist from specific user_id
    public function getList($user_id)
    {
        if (UserList::where("user_id", $user_id)->exists()) {
            $user_lists = UserList::where("user_id", $user_id)
                ->get()
                ->toJson(JSON_PRETTY_PRINT);
            return response($user_lists, 200);
        } else {
            return response()->json(
                [
                    "message" => "List not found",
                ],
                404
            );
        }
    }
    
    // deleteList
    public function deleteList($id)
    {
        if (UserList::where("id", $id)->exists()) {
            $list = UserList::find($id);
            $list->delete();

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


