<?php

namespace App\Http\Controllers;

use App\Enums\ChronicDiseasesEnum;
use App\Http\Controllers\Controller;
use App\Models\MealHistory;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    public function dashboard()
    {
        $date = request()->has('date') ? request()->input('date') : '16-04-2024';
        $folderPath = public_path('FitbitData/'. $date);

        // Log::info('folderPath '. $folderPath );
        // Read JSON files
        $activities = json_decode(File::get($folderPath . '/activity.json'), true);
        $breathing  = json_decode(File::get($folderPath . '/breathing_rate.json'), true);
        $core_temperature = json_decode(File::get($folderPath . '/core_temp.json'), true);
        $heart_rate = json_decode(File::get($folderPath . '/heart_rate.json'), true);
        $sleep = json_decode(File::get($folderPath . '/sleep.json'), true);

        $food_goals = json_decode(File::get('FitbitData/food_goals.json'), true);

        $total_calories_burned = $activities['summary']['caloriesOut'];
        // Log::info("total_calories_burned". $total_calories_burned);

        $calories_goal = $food_goals['goals']['calories'];
        // Log::info("calories_goal". $calories_goal);

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

        if ($currentHour >= 6 && $currentHour < 11) {
            $mealType = "Breakfast";
            $allowed_calories = $total_calories * 0.30;
        } elseif ($currentHour >= 11 && $currentHour < 15) {
            $mealType = "Lunch";
            $allowed_calories = $total_calories * 0.35;
        } elseif ($currentHour >= 15 && $currentHour < 18) {
            $mealType = "Snack";
            $allowed_calories = $total_calories * 0.10;
        } elseif ($currentHour >= 18 && $currentHour < 21) {
            $mealType = "Dinner";
            $allowed_calories = $total_calories * 0.25;
        } else {
            $mealType = "It's not mealtime";
        }

        $most_recent_measurement = end($core_temperature['tempCore']);
        $most_recent_temperature = $most_recent_measurement['value'];

        // Log::info('most_recent_temperature'.$most_recent_temperature);
        if ($most_recent_temperature > 38) {
            $minVitaminC = 10;
            $minZinc = 15;
            $maxSpice = 0;
            $exclude_ingredients[] = 'coffee';
        }

        $most_recent_sleep = end($sleep);
        $efficiency = $most_recent_sleep['efficiency'];
        $minutesAsleep = $most_recent_sleep['minutesAsleep'];
        $timeInBed = $most_recent_sleep['timeInBed'];

        $hours_asleep = $minutesAsleep / 60;
        $hoursInBed = $timeInBed / 60;

        if ($efficiency >= 85 && $hours_asleep >= 7 && $hours_asleep <= 9) {
            $sleep_quality = "good";
        } elseif ($hours_asleep < 7) {
            $sleep_quality = "insufficient";
            if ($currentHour >= 14) {
                $exclude_ingredients[] = 'coffee';
            }
        } elseif ($hours_asleep > 9) {
            $sleep_quality = "excessive";
        } elseif ($hoursInBed > $hours_asleep + 1) {
            $sleep_quality = "disturbed";
            if ($currentHour >= 14) {
                $exclude_ingredients[] = 'coffee';
            }
        } else {
            $sleep_quality = "poor";
            if ($currentHour >= 14) {
                $exclude_ingredients[] = 'coffee';
            }
        }

        $most_recent_breathing = end($breathing['br']);
        $breathing_rate = $most_recent_breathing['value']['breathingRate'];
        // Log::info('breathing_rate'. $breathing_rate);

        $most_recent_heart_rate = end($heart_rate);
        $averageHeart_rate = $most_recent_heart_rate['value']['bpm'];
        // Log::info('averageHeart_rate'. $averageHeart_rate);

        if (($breathing_rate >= 12 && $breathing_rate <= 20) && ($averageHeart_rate >= 60 && $averageHeart_rate <= 100)) {
            $breath_rate = "normal";
            $heart_rate = "normal";
        } else {
            $breath_rate = "anormal";
            $heart_rate = "anormal";
            $exclude_ingredients = array_merge($exclude_ingredients, array('coffee', 'hot sauce'));
            $maxAlcohol = 0;
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
                        $maxSaturatedFat = 15;
                        $maxSodium = 200;
                        break;
                    case ChronicDiseasesEnum::CANCER:
                        $maxSaturatedFat = 10;
                        $maxSugar = 20;
                        break;
                    case ChronicDiseasesEnum::RESPIRATORY_DISEASES:
                        $maxSaturatedFat = 15;
                        $maxSodium = 300;
                        break;
                    case ChronicDiseasesEnum::ALZHEIMERS_AND_DEMENTIAS:
                        $maxSaturatedFat = 15;
                        $maxCholesterol = 30;
                        break;
                    case ChronicDiseasesEnum::INFECTIOUS_DISEASES:
                        $maxSaturatedFat = 15;
                        $maxSugar = 20;
                        break;
                    case ChronicDiseasesEnum::MENTAL_HEALTH_DISORDERS:
                        $maxSugar = 30;
                        break;
                    case ChronicDiseasesEnum::OSTEOARTHRITIS_AND_RHEUMATOID_ARTHRITIS:
                        $maxSaturatedFat = 15;
                        $maxSugar = 20;
                        break;
                    case ChronicDiseasesEnum::GASTROESOPHAGEAL_REFLUX_DISEASE:
                        $maxSaturatedFat = 15;
                        $maxSugar = 20;
                        $maxCaffeine = 50;
                        break;
                    case ChronicDiseasesEnum::OTHER:
                        break;
                }
            }
        }
        $exclude_ingredients[] = 'coffee';
        $unique_ingredients_array = array_unique($exclude_ingredients);
        $exclude_ingredients = implode(',', $unique_ingredients_array);

        //spoonacular
        $client = new Client();

        $params = [
            'query' => [
                'apiKey' => env('API_KEY'),
                'query' => request()->has('search') ? request()->input('search') : null,
                'maxCalories' => $allowed_calories ?? null,
                'minVitaminC' => $minVitaminC ?? null,
                'minZinc' => $minZinc ?? null,
                'maxSpice' => $maxSpice ?? null,
                'exclude_ingredients' => $exclude_ingredients ?? null,
                'sort' => 'healthiness' ?? null,
                'addRecipeNutrition' => true,
                'maxAlcohol' => $maxAlcohol ?? null,
                'cuisine' => request()->has('cuisine') ? implode(',', request()->input('cuisine')) : null,
                'type' => request()->has('type') ? implode(',', request()->input('type')) : null,
                'diet' => request()->has('diet') ? implode(',', request()->input('diet')) : null,
                'intolerances' => $intolerances ?? null,
                'maxSaturatedFat' => $maxSaturatedFat ?? null,
                'maxSodium' => $maxSodium ?? null,
                'maxSugar' => $maxSugar ?? null,
                'maxCaffeine' => $maxCaffeine ?? null,
                'maxCholesterol' => $maxCholesterol ?? null,
                'number' => '200',
            ]
        ];

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

            return view('index', ['recipes' => $paginatedItems]);
        } else {
            $errorMessage = "Error: " . $response->getStatusCode();
            return view('index')->with('error', $errorMessage);
        }
    }

    public function recipe($id, Request $request)
    {
        $client = new Client();
        $params = [
            'query' => [
                'apiKey' => env('API_KEY'),
            ]
        ];

        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/' . $id . '/information', $params);

        if ($response->getStatusCode() == 200) {
            $responseData = json_decode($response->getBody(), true);
            return view('recipe_detail', ['recipe' => $responseData, 'calories' => $request->input('calories')]);
        } else {
            $errorMessage = "Error: " . $response->getStatusCode();
            return view('recipe_detail')->with('error', $errorMessage);
        }
    }
}
