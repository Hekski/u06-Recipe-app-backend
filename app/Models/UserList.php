<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    use HasFactory;

    protected $table = 'user_lists';

    protected $fillable = ['user_id', 'title'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function recipe() {
        return $this->hasMany(UserList::class, 'user_list_id');
    }
}
