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
                                    ->value('updated_at');

            $recipe['updated_at'] = $creationDate;
            $recipe['calories'] =  $data['calories'];

            $filteredRecipes[] = $recipe;
        }
        Log::info($filteredRecipes);

        return view('history', compact('filteredRecipes'));
    }

    public function show($id)
    {
        $mealHistory = MealHistory::where('recipe_id', $id)->first();
        $recipe = json_decode($mealHistory->recipe, true);
        $calories = $mealHistory->calories;

        return view('recipe_detail', compact('recipe', 'calories'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $client = new Client();
        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/'. $request->input('recipe_id').'/information', [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ]);

        if ($response->getStatusCode() == 200) {
            $recipe = json_decode($response->getBody(), true);

            MealHistory::updateOrCreate(
                ['user_id' => $user->id, 'recipe_id' =>  $request->input('recipe_id')],
                ['calories' => $request->input('calories'), 'recipe' => json_encode($recipe)]
            );

            return response(['message' => 'Meal history stored successfully']);
        } else {
            return response(['error' => 'Failed to fetch recipe.'], $response->getStatusCode());
        }
    }
}
