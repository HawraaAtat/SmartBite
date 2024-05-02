<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealHistory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['user_id', 'recipe_id', 'calories'];


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
