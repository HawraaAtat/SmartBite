<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RecipeController extends Controller
{
    public function fetchRecipes(Request $request)
    {
        // API key and base URL
        $apiKey = 'YOUR_API_KEY';
        $baseUrl = 'https://api.spoonacular.com/recipes/complexSearch';

        // User inputs or data FROM FITBIT
        //Haw badna nzabetun
        $heartRate = $request->input('heart_rate'); // Average heart rate per minute
        $userAllowedCalories = $request->input('user_allowed_calories'); // Calories allowed per day
        $breathingRate = $request->input('breathing_rate'); // Breathing rate per minute
        $sleepHour = $request->input('sleep_hour'); // Sleep duration in minutes
        $bodyTemperature = $request->input('body_temperature'); // Body temperature in degrees Celsius

        // Define weights
        // Hassab ahamiyit kl factor
        // Sum of all weights=1
        // We have 5 factors, we must give them importance weights accordingly.
        //1. Allowed calories: Customizing recipes to fit within your allowed calorie intake is crucial for weight management and overall health.
        //2. Sleep hours: Dietary choices can impact sleep quality, so ensuring adequate sleep hours remains important for overall well-being.
        //3. Breathing rate at the minute: Certain foods may affect breathing patterns, particularly in individuals with allergies or sensitivities. Choosing foods that don't trigger respiratory issues is beneficial.
        //4. Heart rate at the minute: While dietary choices can influence heart health indirectly through factors like blood pressure and cholesterol levels, the immediate effect on heart rate from specific recipes may be less significant.
        //5. Body temperature: Dietary choices can affect metabolism, which in turn can influence body temperature regulation. However, this effect may be more gradual and less immediate compared to other factors.
        
        //FINA BALA LWEIGHTS

        $heartRateWeight = 0.2;
        $caloriesWeight = 0.3;
        $breathingRateWeight = 0.2;
        $sleepHourWeight = 0.2;
        $bodyTemperatureWeight = 0.1;

        // Calculate weighted averages
        $weightedHeartRate = $heartRate * $heartRateWeight;
        $weightedCalories = $userAllowedCalories * $caloriesWeight;
        $weightedBreathingRate = $breathingRate * $breathingRateWeight;
        $weightedSleepHour = $sleepHour * $sleepHourWeight;
        $weightedBodyTemperature = $bodyTemperature * $bodyTemperatureWeight;

        // Check conditions and generate exclusion list
        $excludeRecipes = [];


        //FINA BALA LWEIGHTS

        //Regarding sleep hours, l minimum for someone aged 14+ is 7 hours. (Margin 6h 30 min) 
        //API-> in minutes : so minimum 390 minutes of sleep
        //390*0.2=78

        //Regarding heart rate, the maximum is 100
        //100*0.2=20

        //Regarding breathing rate, the maximum is 20 breathes/minute
        //20*0.2=4
        // Exclude certain recipes if the user wants to sleep, heart rate is high, or breathing rate is high
        if ($weightedSleepHour < 78 || $weightedHeartRate > 20 || $weightedBreathingRate > 4) {
            $excludeRecipes = array_merge($excludeRecipes, ['coffee', 'energy drink', 'spicy food', 'heavy meals']);
            $includeRecipes = ['herbal tea', 'oatmeal', 'salmon', 'leafy greens', 'bananas'];

        }



        // Exclude recipes with certain ingredients based on body temperature or other factors
        if ($weightedBodyTemperature > 37.5) {
            $excludeRecipes = array_merge($excludeRecipes, ['hot sauce', 'spicy food', 'heavy meals', 'coffee', 'sugar', 'energy drink']);
            $includeRecipes = ['herbal tea', 'oatmeal', 'salmon', 'leafy greens', 'fruits'];

        }

        // Construct request parameters
        $queryParams = [
            'apiKey' => $apiKey,
            'sort' => 'calories',
            'sortDirection' => 'asc', 
            'minCalories' => $weightedCalories - 100,
            'maxCalories' => $weightedCalories + 100,
            'excludeIngredients' => implode(',', $excludeRecipes),
        ];

        //fina bala lweights, bs ahsan nkun am naate importance kermel lli am y2ra lcoding yaarf kif llogic
        // Send request to Spoonacular API using Laravel's HTTP client
        try {
            $response = Http::get($baseUrl, $queryParams);
            $recipes = $response->json()['results'];

            // Handle and return recipes...
            return response()->json($recipes);
        } catch (\Exception $e) {
            // Handle API request errors
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
