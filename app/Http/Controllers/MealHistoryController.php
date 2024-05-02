<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealHistory; 


class MealHistoryController extends Controller
{

    public function index()
    {
        // Logic to show a list of resources
    }

    public function show($id)
    {
    }

    public function store(Request $request, $userId, $recipeId)
{
    if ($userId != auth()->id()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $mealHistory = new MealHistory();
    $mealHistory->user_id = $userId;
    $mealHistory->recipe_id = $recipeId;
    $mealHistory->calories = 0; 
    $mealHistory->save();

    return response()->json(['message' => 'Meal history stored successfully'], 201);
}
    public function update(Request $request, $id)
    {
        // Logic to update an existing resource
    }

    public function destroy($id)
    {
        // Logic to delete a resource
    }
}
