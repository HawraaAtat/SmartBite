<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealHistory;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;


class MealHistoryController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        $cookedRecipeIds = MealHistory::where('user_id', $user->id)->pluck('recipe_id')->toArray();

        $client = new Client();
        $filteredRecipes = [];
        foreach ($cookedRecipeIds as $recipeId) {
            $params = [
                'query' => [
                    'apiKey' => env('API_KEY'),
                ]
            ];

            $response = $client->request('GET', 'https://api.spoonacular.com/recipes/'.$recipeId.'/information', $params);

            if ($response->getStatusCode() == 200) {
                $recipeData = json_decode($response->getBody(), true);

                $creationDate = MealHistory::where('user_id', $user->id)
                                       ->where('recipe_id', $recipeId)
                                       ->value('created_at');

            $recipeData['created_at'] = $creationDate;

            $filteredRecipes[] = $recipeData;

            }
        }

        return view('history', compact('filteredRecipes'));
    }
    
    public function store(Request $request, $userId, $recipeId)
    {
        if ($userId != auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $mealHistory = new MealHistory();
        $mealHistory->user_id = $userId;
        $mealHistory->recipe_id = $recipeId;
        $mealHistory->calories = $request->input('calories');
        $mealHistory->save();

        return response(['message' => 'Meal history stored successfully']);
    }

}
