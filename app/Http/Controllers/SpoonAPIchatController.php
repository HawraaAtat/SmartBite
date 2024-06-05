<?php

namespace App\Http\Controllers;

use App\Models\SpoonAPIchat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 
use GuzzleHttp\Client;
use App\Enums\ChronicDiseasesEnum;
use App\Http\Controllers\Controller;
use App\Models\MealHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class SpoonAPIchatController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function listLogicalInputs(Request $request)
    {   
        // try {
        //     $response1 = Http::get('https://api.spoonacular.com/recipes/complexSearch', [
        //         'apiKey' => env('API_KEY'),
        //         'query' => 'food'
        //     ]);
        //     $response2 = Http::get('https://api.spoonacular.com/recipes/random', [
        //         'apiKey' => env('API_KEY')
        //     ]);
        //     if ($response1->failed() || $response2->failed()) {
        //         return response()->json(['error' => 'Failed to retrieve menu items'], 500);
        //     }
        //     $menuItems1 = $response1->json()['results'];
        //     $menuItems2 = $response2->json()['recipes'];
        //     $menuItems = array_merge($menuItems1, $menuItems2);
        //     return view('suggestions', ['menuItems' => $menuItems]);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
        try {
        $date = request()->has('date') ? request()->input('date') : '16-04-2024';
        $folderPath = public_path('FitbitData/' . $date);
        $activities = json_decode(File::get($folderPath . '/activity.json'), true);
        $breathing  = json_decode(File::get($folderPath . '/breathing_rate.json'), true);
        $core_temperature = json_decode(File::get($folderPath . '/core_temp.json'), true);
        $heart_rate = json_decode(File::get($folderPath . '/heart_rate.json'), true);
        $sleep = json_decode(File::get($folderPath . '/sleep.json'), true);

        $food_goals = json_decode(File::get('FitbitData/food_goals.json'), true);

        $total_calories_burned = $activities['summary']['caloriesOut'];
        $calories_goal = $food_goals['goals']['calories'];
        $user = Auth::user();
        $userId = $user->id;
        $start_of_Day = Carbon::today()->startOfDay();
        $end_of_day = Carbon::today()->endOfDay();
        $database_calories = MealHistory::where('user_id', $userId)
            ->whereBetween('created_at', [$start_of_Day, $end_of_day])
            ->sum('calories');

        $now = now();
        $currentHour = $now->format('H');
        $total_calories = $calories_goal + $total_calories_burned - $database_calories;

        if ($currentHour >= 6 && $currentHour < 12) {
            $mealType = "Breakfast";
            $allowed_calories = $total_calories * 0.25;
        } elseif ($currentHour >= 12 && $currentHour < 15) {
            $mealType = "Lunch";
            $allowed_calories = $total_calories * 0.35;
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $mealType = "Snack";
            $allowed_calories = $total_calories * 0.1;
        } elseif ($currentHour >= 18 && $currentHour < 21) {
            $mealType = "Dinner";
            $allowed_calories = $total_calories * 0.3;
        } else {
            $mealType = "It's not mealtime";
        }

        $most_recent_measurement = end($core_temperature['tempCore']);
        $most_recent_temperature = $most_recent_measurement['value'];
        if ($most_recent_temperature > 38) {
            $minVitaminC = 10;
            $minZinc = 1;
            $maxAlcohol = 0;
            $sort = 'vitamin-c';
            $sortDirection = 'desc';
        }

        $most_recent_sleep = reset($sleep);
        $efficiency = $most_recent_sleep['efficiency'];
        $minutesAsleep = $most_recent_sleep['minutesAsleep'];
        $timeInBed = $most_recent_sleep['timeInBed'];

        $hours_asleep = $minutesAsleep / 60;
        $hoursInBed = $timeInBed / 60;

        if ($efficiency >= 85 && $hours_asleep >= 7 && $hours_asleep <= 9) {
            $sleep_quality = "good";
        } elseif ($hours_asleep < 7) {
            $sleep_quality = "insufficient";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        } elseif ($hours_asleep > 9) {
            $sleep_quality = "excessive";
            $sort = 'caffeine';
            $sortDirection = 'desc';
        } elseif ($hoursInBed > $hours_asleep + 1) {
            $sleep_quality = "disturbed";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        } else {
            $sleep_quality = "poor";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        }

        $most_recent_breathing = end($breathing['br']);
        $breathing_rate = $most_recent_breathing['value']['breathingRate'];

        $most_recent_heart_rate = end($heart_rate);
        $averageHeart_rate = $most_recent_heart_rate['value']['bpm'];

        if (($breathing_rate >= 12 && $breathing_rate <= 20) && ($averageHeart_rate >= 60 && $averageHeart_rate <= 100)) {
            $breath_rate = "normal";
            $heart_rate = "normal";
        } else {
            $breath_rate = "anormal";
            $heart_rate = "anormal";
            $maxCaffeine = 0;
            $maxAlcohol = 0;
            $sort = 'sodium';
            $sortDirection = 'asc';
        }

        $allergies = $user->allergies ?? null;
        $intolerances = isset($allergies) ? implode(", ", $allergies) : null;
        $exclude_ingredients = [];
        $ethicalMealConsiderations = $user->ethical_meal_considerations;

        if ($ethicalMealConsiderations == 1) {
            $exclude_ingredients = array_merge($exclude_ingredients, [
                'gelatin',
                'ground pork',
                'ground pork sausage',
                'lean pork tenderloin',
                'pork',
                'Pork & Beans',
                'pork belly',
                'pork butt',
                'pork chops',
                'pork links',
                'pork loin chops',
                'pork loin roast',
                'pork roast',
                'pork shoulder',
                'pork tenderloin'
            ]);
            $maxAlcohol = 0;
        }

        $chronicDiseases = $user->chronic_diseases ?? null;
        if (isset($chronicDiseases)) {
            foreach ($chronicDiseases as $disease) {
                switch ($disease) {
                    case ChronicDiseasesEnum::CARDIOVASCULAR_DISEASES:
                    case ChronicDiseasesEnum::DIABETES:
                    case ChronicDiseasesEnum::OBESITY_AND_OVERWEIGHT:
                    case ChronicDiseasesEnum::CHRONIC_KIDNEY_DISEASE:
                    case ChronicDiseasesEnum::CANCER:
                        $maxSaturatedFat = 4.3;
                        $minSodium = 50;
                        $maxSugar = 8;
                        break;
                    case ChronicDiseasesEnum::RESPIRATORY_DISEASES:
                        $maxSaturatedFat = 10;
                        $minSodium = 50;
                        break;
                    case ChronicDiseasesEnum::ALZHEIMERS_AND_DEMENTIAS:
                        $maxSaturatedFat = 10;
                        $maxCholesterol = 30;
                        break;
                    case ChronicDiseasesEnum::INFECTIOUS_DISEASES:
                    case ChronicDiseasesEnum::OSTEOARTHRITIS_AND_RHEUMATOID_ARTHRITIS:
                        $maxSaturatedFat = 10;
                        $maxSugar = 10;
                        break;
                    case ChronicDiseasesEnum::MENTAL_HEALTH_DISORDERS:
                        $maxSugar = 30;
                        break;
                    case ChronicDiseasesEnum::GASTROESOPHAGEAL_REFLUX_DISEASE:
                        $maxSaturatedFat = 5;
                        $maxSugar = 10;
                        $maxCaffeine = 5;
                        break;
                    case ChronicDiseasesEnum::OTHER:
                        break;
                }
            }
        }
        $exclude_ingredients[] = 'coffee';
        $unique_ingredients_array = array_unique($exclude_ingredients);
        $exclude_ingredients = implode(',', $unique_ingredients_array);

        //saturated fat sum over a week
        $oneWeekAgo = Carbon::now()->subWeek();

        $history = MealHistory::where('user_id', $user->id)
            ->whereBetween('created_at', [$oneWeekAgo, $now])
            ->orderBy('created_at', 'desc')
            ->get();

        $saturated_fat_week_percentage = 0;
        foreach ($history as $data) {
            $saturated_fat_week_percentage += $data['saturated_fat'];
        }
        if ($saturated_fat_week_percentage > 700) {
            $maxSaturatedFat = 0;
        };

        //spoonacular
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => env('API_KEY'),
                'query' => "food",
                'maxCalories' => $allowed_calories ?? null,
                'minVitaminC' => $minVitaminC ?? null,
                'minZinc' => $minZinc ?? null,
                'minSodium' => $minSodium ?? null,
                'maxSpice' => $maxSpice ?? null,
                'exclude_ingredients' => $exclude_ingredients ?? null,
                'sort' => $sort ?? 'healthiness',
                'sortDirection' => $sortDirection ?? 'desc',
                'addRecipeNutrition' => true,
                'maxAlcohol' => $maxAlcohol ?? null,
                'cuisine' => request()->has('cuisine') ? implode(',', request()->input('cuisine')) : null,
                'type' => request()->has('type') ? implode(',', request()->input('type')) : null,
                'diet' => request()->has('diet') ? implode(',', request()->input('diet')) : null,
                'intolerances' => $intolerances ?? null,
                'maxSaturatedFat' => $maxSaturatedFat ?? null,
                'maxSugar' => $maxSugar ?? null,
                'maxCaffeine' => $maxCaffeine ?? null,
                'maxCholesterol' => $maxCholesterol ?? null,
                'number' => '200',
            ]
        ];

        Log::info($params);

        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/complexSearch', $params);

        if ($response->getStatusCode() == 200) {
            $recipes = json_decode($response->getBody(), true);

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($recipes['results']);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);

            $paginatedItems->appends(request()->query());

            $paginatedItems->setPath(request()->url());

            return view('suggestions', ['menuItems' => $paginatedItems]);
            
            Log::info($paginatedItems);
            Log::info("hi");
        } else {
            $errorMessage = "Error: " . $response->getStatusCode();
            Log::info($paginatedItems);
            
            Log::info("hi");
                        return view('suggestions')->with('error', $errorMessage);
        }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
            Log::info("hi");
        }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function mealSuggest(Request $request)
    {
        try {
            $userChoice = $request->input('suggestion');
            if (!$userChoice) {
                return response()->json(['error' => 'Suggestion is required'], 400);
            }
        $date = request()->has('date') ? request()->input('date') : '16-04-2024';
        $folderPath = public_path('FitbitData/' . $date);
        $activities = json_decode(File::get($folderPath . '/activity.json'), true);
        $breathing  = json_decode(File::get($folderPath . '/breathing_rate.json'), true);
        $core_temperature = json_decode(File::get($folderPath . '/core_temp.json'), true);
        $heart_rate = json_decode(File::get($folderPath . '/heart_rate.json'), true);
        $sleep = json_decode(File::get($folderPath . '/sleep.json'), true);

        $food_goals = json_decode(File::get('FitbitData/food_goals.json'), true);

        $total_calories_burned = $activities['summary']['caloriesOut'];
        $calories_goal = $food_goals['goals']['calories'];
        $user = Auth::user();
        $userId = $user->id;
        $start_of_Day = Carbon::today()->startOfDay();
        $end_of_day = Carbon::today()->endOfDay();
        $database_calories = MealHistory::where('user_id', $userId)
            ->whereBetween('created_at', [$start_of_Day, $end_of_day])
            ->sum('calories');

        $now = now();
        $currentHour = $now->format('H');
        $total_calories = $calories_goal + $total_calories_burned - $database_calories;

        if ($currentHour >= 6 && $currentHour < 12) {
            $mealType = "Breakfast";
            $allowed_calories = $total_calories * 0.25;
        } elseif ($currentHour >= 12 && $currentHour < 15) {
            $mealType = "Lunch";
            $allowed_calories = $total_calories * 0.35;
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $mealType = "Snack";
            $allowed_calories = $total_calories * 0.1;
        } elseif ($currentHour >= 18 && $currentHour < 21) {
            $mealType = "Dinner";
            $allowed_calories = $total_calories * 0.3;
        } else {
            $mealType = "It's not mealtime";
        }

        $most_recent_measurement = end($core_temperature['tempCore']);
        $most_recent_temperature = $most_recent_measurement['value'];
        if ($most_recent_temperature > 38) {
            $minVitaminC = 10;
            $minZinc = 1;
            $maxAlcohol = 0;
            $sort = 'vitamin-c';
            $sortDirection = 'desc';
        }

        $most_recent_sleep = reset($sleep);
        $efficiency = $most_recent_sleep['efficiency'];
        $minutesAsleep = $most_recent_sleep['minutesAsleep'];
        $timeInBed = $most_recent_sleep['timeInBed'];

        $hours_asleep = $minutesAsleep / 60;
        $hoursInBed = $timeInBed / 60;

        if ($efficiency >= 85 && $hours_asleep >= 7 && $hours_asleep <= 9) {
            $sleep_quality = "good";
        } elseif ($hours_asleep < 7) {
            $sleep_quality = "insufficient";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        } elseif ($hours_asleep > 9) {
            $sleep_quality = "excessive";
            $sort = 'caffeine';
            $sortDirection = 'desc';
        } elseif ($hoursInBed > $hours_asleep + 1) {
            $sleep_quality = "disturbed";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        } else {
            $sleep_quality = "poor";
            if ($currentHour >= 14) { $maxCaffeine = 20; }
            $sort = 'caffeine';
            $sortDirection = 'asc';
        }

        $most_recent_breathing = end($breathing['br']);
        $breathing_rate = $most_recent_breathing['value']['breathingRate'];

        $most_recent_heart_rate = end($heart_rate);
        $averageHeart_rate = $most_recent_heart_rate['value']['bpm'];

        if (($breathing_rate >= 12 && $breathing_rate <= 20) && ($averageHeart_rate >= 60 && $averageHeart_rate <= 100)) {
            $breath_rate = "normal";
            $heart_rate = "normal";
        } else {
            $breath_rate = "anormal";
            $heart_rate = "anormal";
            $maxCaffeine = 0;
            $maxAlcohol = 0;
            $sort = 'sodium';
            $sortDirection = 'asc';
        }

        $allergies = $user->allergies ?? null;
        $intolerances = isset($allergies) ? implode(", ", $allergies) : null;
        $exclude_ingredients = [];
        $ethicalMealConsiderations = $user->ethical_meal_considerations;

        if ($ethicalMealConsiderations == 1) {
            $exclude_ingredients = array_merge($exclude_ingredients, [
                'gelatin',
                'ground pork',
                'ground pork sausage',
                'lean pork tenderloin',
                'pork',
                'Pork & Beans',
                'pork belly',
                'pork butt',
                'pork chops',
                'pork links',
                'pork loin chops',
                'pork loin roast',
                'pork roast',
                'pork shoulder',
                'pork tenderloin'
            ]);
            $maxAlcohol = 0;
        }

        $chronicDiseases = $user->chronic_diseases ?? null;
        if (isset($chronicDiseases)) {
            foreach ($chronicDiseases as $disease) {
                switch ($disease) {
                    case ChronicDiseasesEnum::CARDIOVASCULAR_DISEASES:
                    case ChronicDiseasesEnum::DIABETES:
                    case ChronicDiseasesEnum::OBESITY_AND_OVERWEIGHT:
                    case ChronicDiseasesEnum::CHRONIC_KIDNEY_DISEASE:
                    case ChronicDiseasesEnum::CANCER:
                        $maxSaturatedFat = 4.3;
                        $minSodium = 50;
                        $maxSugar = 8;
                        break;
                    case ChronicDiseasesEnum::RESPIRATORY_DISEASES:
                        $maxSaturatedFat = 10;
                        $minSodium = 50;
                        break;
                    case ChronicDiseasesEnum::ALZHEIMERS_AND_DEMENTIAS:
                        $maxSaturatedFat = 10;
                        $maxCholesterol = 30;
                        break;
                    case ChronicDiseasesEnum::INFECTIOUS_DISEASES:
                    case ChronicDiseasesEnum::OSTEOARTHRITIS_AND_RHEUMATOID_ARTHRITIS:
                        $maxSaturatedFat = 10;
                        $maxSugar = 10;
                        break;
                    case ChronicDiseasesEnum::MENTAL_HEALTH_DISORDERS:
                        $maxSugar = 30;
                        break;
                    case ChronicDiseasesEnum::GASTROESOPHAGEAL_REFLUX_DISEASE:
                        $maxSaturatedFat = 5;
                        $maxSugar = 10;
                        $maxCaffeine = 5;
                        break;
                    case ChronicDiseasesEnum::OTHER:
                        break;
                }
            }
        }
        $exclude_ingredients[] = 'coffee';
        $unique_ingredients_array = array_unique($exclude_ingredients);
        $exclude_ingredients = implode(',', $unique_ingredients_array);

        //saturated fat sum over a week
        $oneWeekAgo = Carbon::now()->subWeek();

        $history = MealHistory::where('user_id', $user->id)
            ->whereBetween('created_at', [$oneWeekAgo, $now])
            ->orderBy('created_at', 'desc')
            ->get();

        $saturated_fat_week_percentage = 0;
        foreach ($history as $data) {
            $saturated_fat_week_percentage += $data['saturated_fat'];
        }
        if ($saturated_fat_week_percentage > 700) {
            $maxSaturatedFat = 0;
        };

        //spoonacular
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => env('API_KEY'),
                'query' => $userChoice,
                'maxCalories' => $allowed_calories ?? null,
                'minVitaminC' => $minVitaminC ?? null,
                'minZinc' => $minZinc ?? null,
                'minSodium' => $minSodium ?? null,
                'maxSpice' => $maxSpice ?? null,
                'exclude_ingredients' => $exclude_ingredients ?? null,
                'sort' => $sort ?? 'healthiness',
                'sortDirection' => $sortDirection ?? 'desc',
                'addRecipeNutrition' => true,
                'maxAlcohol' => $maxAlcohol ?? null,
                'cuisine' => request()->has('cuisine') ? implode(',', request()->input('cuisine')) : null,
                'type' => request()->has('type') ? implode(',', request()->input('type')) : null,
                'diet' => request()->has('diet') ? implode(',', request()->input('diet')) : null,
                'intolerances' => $intolerances ?? null,
                'maxSaturatedFat' => $maxSaturatedFat ?? null,
                'maxSugar' => $maxSugar ?? null,
                'maxCaffeine' => $maxCaffeine ?? null,
                'maxCholesterol' => $maxCholesterol ?? null,
                'number' => '200',
            ]
        ];

        Log::info($params);

        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/complexSearch', $params);

        if ($response->getStatusCode() == 200) {
            $recipes = json_decode($response->getBody(), true);

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($recipes['results']);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);

            $paginatedItems->appends(request()->query());

            $paginatedItems->setPath(request()->url());

            return view('suggestions', ['menuItems' => $paginatedItems]);
            // Log::info($paginatedItems);
            
            // Log::info("hi1");
        } else {
            $errorMessage = "Error: " . $response->getStatusCode();
                        Log::info($paginatedItems);
            
            Log::info("hi1");
            return view('suggestions')->with('error', $errorMessage);
        }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
            Log::info("hi1");
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
