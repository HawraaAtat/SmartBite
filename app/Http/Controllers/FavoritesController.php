<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request, $id)
    {
        
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve the IDs of recipes liked by the authenticated user
        $likedRecipeIds = Favorites::where('user_id', $user->id)->pluck('item_id')->toArray();
        // Fetch recipes from Spoonacular API
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => '4369cde01c844dcaabaea9400aa5745c',
                // Add any other parameters you need for your query
            ]
        ];

    
            $response = $client->request('GET', 'https://api.spoonacular.com/recipes/complexSearch', $params);
            dd("hellooo");

            if ($response->getStatusCode() == 200) {

                $recipes = json_decode($response->getBody(), true);
                dd($recipes);
                $filteredRecipes = array_filter($recipes['results'], function ($recipe) use ($likedRecipeIds) {
                    return in_array($recipe['id'], $likedRecipeIds);
                });
                return view('favorites', compact('filteredRecipes'));
            }
    
        // If no recipes were found, return an empty view
        return view('favorites')->with('filteredRecipes', []);
    }

    
    

    public function store(Request $request, $recipeId)
    {
        $user = Auth::user();

       
        // Store the favorite
        $favorite = new Favorites();
        $favorite->user_id = $user->id;
        $favorite->item_id = $recipeId;
        $favorite->save();

        return response()->json(['message' => 'Recipe favorited successfully.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $recipeId)
    {
        $user = Auth::user();

        // Find and delete the favorite
        $favorite = $user->favorites()->where('item_id', $recipeId)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Recipe unfavorited successfully.'], 200);
        }

        return response()->json(['message' => 'Recipe not found in favorites.'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorites $favorites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorites $favorites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorites $favorites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    
}
