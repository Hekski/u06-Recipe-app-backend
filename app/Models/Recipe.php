<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recepts';

    protected $fillable = ['recipe', 'recipe_id', 'recipe_id', 'user_list_id'];
}
