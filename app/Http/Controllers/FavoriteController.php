<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\Favorite;
use Illuminate\Support\Facades\Log;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
     {
        Log::info("message". $request);
        $user = Auth::user();
        $favorites = Favorite::where('user_id', $user->id)->get();

        $filteredRecipes = [];
        foreach ($favorites as $favorite) {
            $recipe = json_decode($favorite->recipe, true);
            $filteredRecipes[] = $recipe;
        }

         return view('favorites', compact('filteredRecipes'));
     }

    public function store($recipeId)
    {
        $user = Auth::user();

        $client =  new Client();
        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/'.$recipeId.'/information',
        [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ]);

        Log::info($response->getBody());

        if ($response->getStatusCode() == 200) {
            Favorite::create([
                'user_id' => $user->id,
                'item_id' => $recipeId,
                'recipe' => $response->getBody()
            ]);
            return response(['message' => 'Recipe favorited successfully.']);
        } else {
            return response(['error' => 'Failed to fetch recipe.'], $response->getStatusCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($recipeId)
    {
        $user = Auth::user();

        // Find and delete the favorite
        $favorite = $user->favorites()->where('item_id', $recipeId)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Recipe unfavorited successfully.'], 200);
        }

        return response(['message' => 'Recipe not found in favorites.']);
    }
}
