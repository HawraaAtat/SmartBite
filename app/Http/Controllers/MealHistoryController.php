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
        $recipe_detail = $client->request('GET', 'https://api.spoonacular.com/recipes/' . $request->input('recipe_id') . '/information', [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ]);
        $recipe_nutrition = $client->request('GET', 'https://api.spoonacular.com/recipes/' . $request->input('recipe_id') . '/nutritionWidget.json', [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ]);
        $decoded_recipe_nutrition = json_decode($recipe_nutrition->getBody(), true);
        $calories = floatval($decoded_recipe_nutrition['calories']);
        $saturatedFat = floatval($decoded_recipe_nutrition['bad'][2]['percentOfDailyNeeds']);

        if ($recipe_detail->getStatusCode() == 200) {
            $recipe = json_decode($recipe_detail->getBody(), true);

            MealHistory::create([
                'user_id' => $user->id,
                'recipe_id' => $request->input('recipe_id'),
                'calories' => $calories,
                'saturated_fat' => $saturatedFat,
                'recipe' => json_encode($recipe)
            ]);

            return response(['message' => 'Meal history stored successfully']);
        } else {
            return response(['error' => 'Failed to fetch recipe.'], $recipe_detail->getStatusCode());
        }
    }
}
