<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealHistory;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class MealHistoryController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $client = new Client();

        $history = MealHistory::where('user_id', $user->id)->get();

        $filteredRecipes = [];
        foreach ($history as $data) {
            $recipe = json_decode($data->recipe, true);

            $creationDate = MealHistory::where('user_id', $user->id)
                                    ->where('recipe_id', $data->recipe_id)
                                    ->value('created_at');

            $recipe['created_at'] = $creationDate;

            $filteredRecipes[] = $recipe;
        }

        Log::info("recipeData");
        Log::info($recipe);

        return view('history', compact('filteredRecipes'));
    }

    public function show(MealHistory $mealHistory)
    {
        $recipe = json_decode($mealHistory->recipe, true);
        $calories = $mealHistory->calories;

        return view('recipe_detail', compact('recipe', 'calories'));
    }

    public function store(Request $request, $recipeId)
    {
        $user = Auth::user();

        $client = new Client();
        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/'.$recipeId.'/information', [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $recipe = json_decode($response->getBody(), true);

            $mealHistory = MealHistory::create([
                'user_id' => $user->id,
                'recipe_id' => $recipeId,
                'calories' => $request->input('calories'),
                'recipe' => json_encode($recipe)
            ]);

            return response(['message' => 'Meal history stored successfully']);
        } else {
            return response(['error' => 'Failed to fetch recipe.'], $response->getStatusCode());
        }
    }
}
