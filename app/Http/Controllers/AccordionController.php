<?php

namespace App\Http\Controllers;

use App\Models\Accordion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AccordionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("accordion");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'ingredients' => 'required|array',
            'ingredients.*' => 'string',
            'number' => 'required|integer|min:1'
        ]);
    
        // Process the ingredients
        $ingredients = implode(',', $request->input('ingredients'));
        $number = $request->input('number');
        // Send request to Spoonacular API
        $response = Http::get('https://api.spoonacular.com/recipes/findByIngredients', [
            'ingredients' => $ingredients,
            'number' => $number, // You can adjust the number of recipes you want to retrieve
            'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
        ]);
    
        // Check if request was successful
        if ($response->successful()) {
            $recipes = $response->json();
            // Return the retrieved recipes as JSON response
            return response()->json(['recipes' => $recipes]);
        } else {
            // Return an error response
            return response()->json(['error' => 'Failed to fetch recipes'], 500);
        }
    }

    public function store2(Request $request)
    {
        // Validate the request data
        $request->validate([
            'ingredientInfo' => 'required|string', // Adjust the validation rule as per your requirement
        ]);
    
        // Get the ingredient name from the request
        $ingredientName = $request->input('ingredientInfo');
    
        // Send request to Spoonacular API to search for the ingredient
        $response = Http::get('https://api.spoonacular.com/food/ingredients/search', [
            'query' => $ingredientName,
            'number' => 1, // Limit the number of results to 1
            'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
        ]);
    
        // Check if request was successful
        if ($response->successful()) {
            // Extract the ID from the response if available
            $data = $response->json();
            if (isset($data['results'][0]['id'])) {
                $ingredientId = $data['results'][0]['id'];
                
                // Send request to get ingredient information using the obtained ID
                $response = Http::get("https://api.spoonacular.com/food/ingredients/{$ingredientId}/information", [
                    'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
                ]);
    
                // Check if request was successful
                if ($response->successful()) {
                    $ingredientInfo = $response->json();
                    // Return the ingredient information as a JSON response
                    return response()->json($ingredientInfo);
                } else {
                    // Return an error response if request failed
                    return response()->json(['error' => 'Failed to fetch ingredient information'], $response->status());
                }
            } else {
                // Return an error response if no ingredient ID found
                return response()->json(['error' => 'No ingredient ID found'], 404);
            }
        } else {
            // Return an error response if request failed
            return response()->json(['error' => 'Failed to fetch ingredient ID'], $response->status());
        }
    }

    public function store3(Request $request)
    {
        // Validate the request data
        $request->validate([
            'ingredientInfo' => 'required|string', // Adjust the validation rule as per your requirement
        ]);
    
        // Get the ingredient name from the request
        $ingredientName = $request->input('ingredientInfo');
        
        // Get the selected nutrient from the request
        $nutrient = $request->input('measureUnit');
    
        // Send request to Spoonacular API to search for the ingredient
        $response = Http::get('https://api.spoonacular.com/food/ingredients/search', [
            'query' => $ingredientName,
            'number' => 1, // Limit the number of results to 1
            'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
        ]);
    
        // Check if request was successful
        if ($response->successful()) {
            // Extract the ID from the response if available
            $data = $response->json();
            if (isset($data['results'][0]['id'])) {
                $ingredientId = $data['results'][0]['id'];
    
                // Send request to get ingredient information using the obtained ID
                $response = Http::get("https://api.spoonacular.com/food/ingredients/{$ingredientId}/amount", [
                    'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
                    'nutrient' => $nutrient, // Use the selected nutrient from the dropdown list
                    'target' => 1, // Example target amount, you can adjust this as needed
                    'unit' => 'g', // Example unit, you can adjust this as needed
                ]);
    
                // Check if request for ingredient amount was successful
                if ($response->successful()) {
                    // Extract the computed amount from the response
                    $amount = $response['amount'];
    
                    // Return the computed amount
                    return response()->json(['amount' => $amount, 'nutrient' => $nutrient, 'unit' => 'g', 'ingredientName' => $ingredientName]); // Include the nutrient and unit in the response
                }
            }
        }
    
        // Return an error response if any of the requests failed or the ID was not found
        return response()->json(['error' => 'Failed to compute ingredient amount'], 500);
    }

    public function store4(Request $request)
    {
        // Validate the request data
        $request->validate([
            'ingredientName' => 'required|string', // Adjust the validation rule as per your requirement
        ]);
    
        // Get the ingredient name from the request
        $ingredientName = $request->input('ingredientName');
    
        // Send request to Spoonacular API to get substitutes for the ingredient
        $response = Http::get('https://api.spoonacular.com/food/ingredients/substitutes', [
            'apiKey' => '4369cde01c844dcaabaea9400aa5745c', // Replace with your Spoonacular API key
            'ingredientName' => $ingredientName,
        ]);
    
        // Check if request was successful
        if ($response->successful()) {
            // Extract the substitutes from the response
            $data = $response->json();
            if (isset($data['substitutes'])) {
                $substitutes = $data['substitutes'];
                // Return the substitutes along with the ingredient name
                return response()->json([
                    'status' => 'success',
                    'ingredient' => $ingredientName,
                    'substitutes' => $substitutes,
                    'message' => 'Found ' . count($substitutes) . ' substitutes for the ingredient.'
                ]);
            } else {
                // No substitutes found
                return response()->json([
                    'status' => 'success',
                    'ingredient' => $ingredientName,
                    'substitutes' => [],
                    'message' => 'There are no substitutes for this ingredient.'
                ]);
            }
        }
    
        // Return an error response if the request failed
        return response()->json(['status' => 'error', 'error' => 'Failed to get substitutes for the ingredient'], 500);
    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(Accordion $accordion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Accordion $accordion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accordion $accordion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accordion $accordion)
    {
        //
    }
}
