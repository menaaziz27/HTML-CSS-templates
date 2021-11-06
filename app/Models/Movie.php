<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function userModel()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = ["name", "description", "rating", "user_id"];
    protected $hidden = ["_token"];
}
