<?php

namespace App\Http\Controllers;

use App\Models\SpoonAPIchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class SpoonAPIchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("spoonchat");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function listLogicalInputs(Request $request)
    {   
        try {
            $response1 = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
                'apiKey' => env('API_KEY'),
                'query' => 'food'
            ]);
            $response2 = Http::get('https://api.spoonacular.com/recipes/random', [
                'apiKey' => env('API_KEY')
            ]);
            if ($response1->failed() || $response2->failed()) {
                return response()->json(['error' => 'Failed to retrieve menu items'], 500);
            }
            $menuItems1 = $response1->json()['results'];
            $menuItems2 = $response2->json()['recipes'];
            // $menuItems = $response1->json()['results'];
            $menuItems = array_merge($menuItems1, $menuItems2);
            return view('suggestions', ['menuItems' => $menuItems]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function mealSuggest(Request $request)
    {
        try {
            // Check if the suggestion is provided
            $userChoice = $request->input('suggestion');
            if (!$userChoice) {
                return response()->json(['error' => 'Suggestion is required'], 400);
            }
            
            // Make a request to the Spoonacular API
            $response = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
                'apiKey' => env('API_KEY'),
                'query' => $userChoice
            ]);
            
            // Check if the request was successful
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to retrieve menu items'], 500);
            }
            
            // Extract data from the API response
            $menuItems = $response->json()['results'];
    
            // Render the suggestions Blade view with menu items data
            return view('suggestions', ['menuItems' => $menuItems]);
            
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function foodSuggest(Request $request)
    {
        try {
            // Check if the suggestion is provided
            $userChoice = $request->input('suggestion');
            if (!$userChoice) {
                return response()->json(['error' => 'Suggestion is required'], 400);
            }
            
            // Make a request to the Spoonacular API
            $response = Http::get('https://api.spoonacular.com/food/search', [
                'apiKey' => env('API_KEY'),
                'query' => $userChoice
            ]);
            
            // Check if the request was successful
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to retrieve menu items'], 500);
            }
            
            // Extract data from the API response
            $responseData = $response->json();
            
            // Extract relevant data
            $menuItems = $responseData['searchResults'][0]['results'];
    
            // Render the suggestions Blade view with menu items data
            return view('suggestions2', ['menuItems' => $menuItems]);
            
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store3(Request $request)
    {
        try {
            // Check if the suggestion is provided
            $userChoice = $request->input('suggestion');
            if (!$userChoice) {
                return response()->json(['error' => 'Suggestion is required'], 400);
            }
            
            // Make a request to the Spoonacular API
            $response = Http::get('https://api.spoonacular.com/food/converse', [
                'apiKey' => env('API_KEY'),
                'query' => $userChoice
            ]);
            
            // Check if the request was successful
            if ($response->failed()) {
                return response()->json(['error' => 'Failed to retrieve menu items'], 500);
            }
            
            // Extract data from the API response
            $responseData = $response->json();
            
            // Extract relevant data
            $menuItems = $responseData['answerText'][0]['media'];
    
            // Render the suggestions Blade view with menu items data
            return view('suggestions', ['menuItems' => $menuItems]);
            
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
    
    
    /**
     * Display the specified resource.
     */
    public function show(SpoonAPIchat $spoonAPIchat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SpoonAPIchat $spoonAPIchat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SpoonAPIchat $spoonAPIchat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpoonAPIchat $spoonAPIchat)
    {
        //
    }
}
