<?php

namespace App\Http\Controllers;

use App\Models\MealHistory;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        //fitbit api
        ////////////////////////////////////////////////////////////////////////////////////////////////

        //get activities in a day:
        // /1/user/[user-id]/activities/date/[date].json
        // docs url: https://dev.fitbit.com/build/reference/web-api/activity/get-daily-activity-summary/
        // not complete example:
        // curl -X GET "https://api.fitbit.com/1/user/-/activities/date/2019-01-01.json" \
        // -H "accept: application/json" \
        // -H "authorization: Bearer <access_token>"

        // Get Food Goals
        // /1/user/[user-id]/foods/log/goal.json
        // docs url: https://dev.fitbit.com/build/reference/web-api/nutrition/get-food-goals/

        // Get Temperature (Core) Summary by Date
        // /1/user/[user-id]/temp/core/date/[date].json
        // docs url: https://dev.fitbit.com/build/reference/web-api/temperature/get-temperature-core-summary-by-date

        // Get Sleep Log by Date
        // /1.2/user/[user-id]/sleep/date/[date].json
        // docs url: https://dev.fitbit.com/build/reference/web-api/sleep/get-sleep-log-by-date/

        // Get Breathing Rate Summary by Date
        // /1/user/[user-id]/br/date/[date].json
        // docs url: https://dev.fitbit.com/build/reference/web-api/breathing-rate/get-br-summary-by-date/

        // Get ECG Log List returns a list of the user's recorded ECG readings and their details.
        // /1/user/[user-id]/ecg/list.json
        // docs url: https://dev.fitbit.com/build/reference/web-api/electrocardiogram/get-ecg-log-list/

        $activities = [
            "activities" => [],
            "goals" => [
                "activeMinutes" => 30,
                "caloriesOut" => 1950,
                "distance" => 8.05,
                "floors" => 10,
                "steps" => 6800
            ],
            "summary" => [
                "activeScore" => -1,
                "activityCalories" => 525,
                "calorieEstimationMu" => 2241,
                "caloriesBMR" => 1973,
                "caloriesOut" => 2628,
                "caloriesOutUnestimated" => 2628,
                "customHeartRateZones" => [
                    [
                        "caloriesOut" => 2616.7788,
                        "max" => 140,
                        "min" => 30,
                        "minutes" => 1432,
                        "name" => "Below"
                    ],
                    [
                        "caloriesOut" => 0,
                        "max" => 165,
                        "min" => 140,
                        "minutes" => 0,
                        "name" => "Custom Zone"
                    ],
                    [
                        "caloriesOut" => 0,
                        "max" => 220,
                        "min" => 165,
                        "minutes" => 0,
                        "name" => "Above"
                    ]
                ],
                "distances" => [
                    [
                        "activity" => "total",
                        "distance" => 1.26
                    ],
                    [
                        "activity" => "tracker",
                        "distance" => 1.26
                    ],
                    [
                        "activity" => "loggedActivities",
                        "distance" => 0
                    ],
                    [
                        "activity" => "veryActive",
                        "distance" => 0
                    ],
                    [
                        "activity" => "moderatelyActive",
                        "distance" => 0
                    ],
                    [
                        "activity" => "lightlyActive",
                        "distance" => 1.25
                    ],
                    [
                        "activity" => "sedentaryActive",
                        "distance" => 0
                    ]
                ],
                "elevation" => 0,
                "fairlyActiveMinutes" => 0,
                "floors" => 0,
                "heartRateZones" => [
                    [
                        "caloriesOut" => 1200.33336,
                        "max" => 86,
                        "min" => 30,
                        "minutes" => 812,
                        "name" => "Out of Range"
                    ],
                    [
                        "caloriesOut" => 1409.4564,
                        "max" => 121,
                        "min" => 86,
                        "minutes" => 619,
                        "name" => "Fat Burn"
                    ],
                    [
                        "caloriesOut" => 6.98904,
                        "max" => 147,
                        "min" => 121,
                        "minutes" => 1,
                        "name" => "Cardio"
                    ],
                    [
                        "caloriesOut" => 0,
                        "max" => 220,
                        "min" => 147,
                        "minutes" => 0,
                        "name" => "Peak"
                    ]
                ],
                "lightlyActiveMinutes" => 110,
                "marginalCalories" => 281,
                "restingHeartPate" => 77,
                "sedentaryMinutes" => 802,
                "steps" => 1698,
                "useEstimation" => true,
                "veryActiveMinutes" => 0
            ]
        ];
        $total_calories_burned = $activities['summary']['caloriesOut'];
        echo $total_calories_burned;
        //

        $food_goals = [
            "goals" => [
                "calories" => 2910
            ]
        ];
        $calories_goal = $food_goals['goals']['calories'];
        echo $calories_goal;
        //

        $userId = auth()->id();

        $start_of_Day = Carbon::today()->startOfDay();

        $end_of_day = Carbon::today()->endOfDay();

        // Query to sum up calories from 12:00 AM today to 12:00 PM today for the authenticated user
        $database_calories = MealHistory::where('user_id', $userId)
                        ->whereBetween('created_at', [$start_of_Day, $end_of_day])
                        ->sum('calories');

        $now = now();
        $currentHour = $now->format('H');
        return "    ".  $database_calories;
        // Get the calories that the user has eaten throughout the day and include it in the formula.
        // maybe food history
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

        $core_temperature = [
            "tempCore" => [
                [
                    "dateTime" => "2020-06-18T10:00:00",
                    "value" => 37.5,
                ],
                [
                    "dateTime" => "2020-06-18T12:10:00",
                    "value" => 38.1,
                ],
            ]
        ];
        $most_recent_measurement = end($core_temperature['tempCore']);
        $most_recent_temperature = $most_recent_measurement['value'];


        $most_recent_temperature = 39;
        if ($most_recent_temperature > 38) {
            // "The person might be sick.";
            $minVitaminC = 50; // Increase vitamin C for immune support if fever is present
            $minZinc = 15; // Zinc may help immune function
            $maxSpice = 0; // Assuming 'maxSpice' could control spicy ingredients; reduce if fever is present
            $exclude_ingredients[] = 'coffee'; // Dairy and caffeine might be less suitable for a sick person
        }
        //

        $sleep = [
            "sleep" => [
                [
                    "dateOfSleep" => "2020-02-21",
                    "duration" => 27720000,
                    "efficiency" => 96,
                    "endTime" => "2020-02-21T07:03:30.000",
                    "infoCode" => 0,
                    "isMainSleep" => true,
                    "levels" => [
                        "data" => [
                            [
                                "dateTime" => "2020-02-20T23:21:30.000",
                                "level" => "wake",
                                "seconds" => 630
                            ],
                            [
                                "dateTime" => "2020-02-20T23:32:00.000",
                                "level" => "light",
                                "seconds" => 30
                            ],
                            [
                                "dateTime" => "2020-02-20T23:32:30.000",
                                "level" => "deep",
                                "seconds" => 870
                            ],
                            // ... other data elements ...
                            [
                                "dateTime" => "2020-02-21T06:32:30.000",
                                "level" => "light",
                                "seconds" => 1860
                            ]
                        ],
                        "shortData" => [
                            [
                                "dateTime" => "2020-02-21T00:10:30.000",
                                "level" => "wake",
                                "seconds" => 30
                            ],
                            [
                                "dateTime" => "2020-02-21T00:15:00.000",
                                "level" => "wake",
                                "seconds" => 30
                            ],
                            // ... other shortData elements ...
                            [
                                "dateTime" => "2020-02-21T06:18:00.000",
                                "level" => "wake",
                                "seconds" => 60
                            ]
                        ],
                        "summary" => [
                            "deep" => [
                                "count" => 5,
                                "minutes" => 104,
                                "thirtyDayAvgMinutes" => 69
                            ],
                            "light" => [
                                "count" => 32,
                                "minutes" => 205,
                                "thirtyDayAvgMinutes" => 202
                            ],
                            "rem" => [
                                "count" => 11,
                                "minutes" => 75,
                                "thirtyDayAvgMinutes" => 87
                            ],
                            "wake" => [
                                "count" => 30,
                                "minutes" => 78,
                                "thirtyDayAvgMinutes" => 55
                            ]
                        ]
                    ],
                    "logId" => 26013218219,
                    "minutesAfterWakeup" => 0,
                    "minutesAsleep" => 384,
                    "minutesAwake" => 78,
                    "minutesToFallAsleep" => 0,
                    "logType" => "auto_detected",
                    "startTime" => "2020-02-20T23:21:30.000",
                    "timeInBed" => 462,
                    "type" => "stages"
                ]
            ],
            "summary" => [
                "stages" => [
                    "deep" => 104,
                    "light" => 205,
                    "rem" => 75,
                    "wake" => 78
                ],
                "totalMinutesAsleep" => 384,
                "totalSleepRecords" => 1,
                "totalTimeInBed" => 462
            ]
        ];

        $most_recent_sleep = end($sleep['sleep']);
        $efficiency = $most_recent_sleep['efficiency']; //85
        $minutesAsleep = $most_recent_sleep['minutesAsleep']; //420
        $timeInBed = $most_recent_sleep['timeInBed']; //480

        // Convert minutes to hours
        $hours_asleep = $minutesAsleep / 60;
        $hoursInBed = $timeInBed / 60;


        // $hours_asleep = 8;
        if($efficiency >= 85 && $hours_asleep >= 7 && $hours_asleep <= 9) {
            $sleep_quality = "good";
        } elseif($hours_asleep < 7) {
            $sleep_quality = "insufficient";
            if ($currentHour >= 14) {
                $exclude_ingredients[] = 'coffee';
            }
        } elseif($hours_asleep > 9) {
            $sleep_quality = "excessive";
        } elseif($hoursInBed > $hours_asleep + 1) { // If time in bed > sleep time
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
        // echo $sleep_quality;
        //

        $breathing = [
            "br" => [
                [
                    "value" => [
                        "breathingRate" => 17.8
                    ],
                    "dateTime" => "2021-10-25"
                ]
            ]
        ];

        $most_recent_breathing = end($breathing['br']);
        $breathing_rate = $most_recent_breathing['value']['breathingRate'];
//
        $heart_rate = [
            "ecgReadings" => [
                [
                    "startTime" => "2022-09-28T17:12:30.222",
                    "averageHeart_rate" => 70,
                    "resultClassification" => "Normal Sinus Rhythm",
                    "waveformSamples" => [
                        130,
                        176,
                        252,
                        365,
                        // ... other waveformSamples elements ...
                    ],
                    "samplingFrequencyHz" => "250",
                    "scalingFactor" => 10922,
                    "numberOfWaveformSamples" => 7700,
                    "leadNumber" => 1,
                    "featureVersion" => "1.2.3-2.11-2.14",
                    "deviceName" => "Sense",
                    "firmwareVersion" => "1.2.3"
                ]
            ],
            "pagination" => [
                "afterDate" => "2022-09-28T20:00:00",
                "limit" => 1,
                "next" => "https://api.fitbit.com/1/user/-/ecg/list.json?offset=10&limit=10&sort=asc&afterDate=2022-09-28T21:00:00",
                "offset" => 0,
                "previous" => "",
                "sort" => "asc"
            ]
        ];

        $most_recent_heart_rate = end($heart_rate['ecgReadings']);
        $averageHeart_rate = $most_recent_heart_rate['averageHeart_rate'];

        // $averageHeart_rate= 120;
        // $breathing_rate = 14;
        //making the tow formulas of the heart rate and breathing rate in one
        if(($breathing_rate >= 12 && $breathing_rate <= 20) && ($averageHeart_rate >= 60 && $averageHeart_rate <= 100)) {
            $breath_rate = "normal";
            $heart_rate = "normal";
        } else {
            $breath_rate = "anormal";
            $heart_rate = "anormal";
            $exclude_ingredients = array_merge($exclude_ingredients, array('coffee', 'hot sauce', 'mayonnaise', 'sunflower oil', 'vegetable oil', 'corn oil'));
            $maxAlcohol = 0;
        }

        //
        //formule

        echo $total_calories;
        echo "<br>";
        // Breakfast: 30-35% of daily calories1
        // Lunch: 35-40% of daily calories1
        // Snack: 10-15% of daily calories1
        // Dinner: 25-35% of daily calories1

        // echo $sleep_quality;
        // echo "<br>";
        // echo $coffee_status;
        // echo "<br>";
        //hasab l coffe status mnesmahlo yekul akl fi caffeine , eza abl l 2pm fi yekul max 400 mill.. eza baad l 2 lezim 0
        //coffee status feyit bel sleep quality, eza kenit poor, inseffcient, disturbed
        // eza good aw exsessive ma mnaamil shi le2en l ahwe ymkin ma t2assir aa aalam w ydal ynzem ktir aade

        // echo $most_recent_temperature;
        // echo "<br>";
        // eza aala mn 38 yaane marid
        echo $breath_rate;
        echo "<br>";
        echo $heart_rate;
        echo "<br>";
        // coffee, energy drink, spicy food, heavy meals

        $exclude_ingredients[]= 'coffee';
        $unique_ingredients_array = array_unique($exclude_ingredients);
        $exclude_ingredients = implode(', ', $unique_ingredients_array);

        // database data
        ///////////////////////////////////////////////////
        // disease, intolerances(spoonacular)
        // $intolerances = get from database;
        // $disease = get from database;


        // return;//ma badna spoonacular now
        //spoonacular
        $client = new Client(); // same client here and  in fitbit api. we move this up

        $params = [
            'query' => [
                'apiKey' => '859e8cec5b5d44828d1d9f917929bfe4',
                // 'query' => 'chicken',
                // 'cuisine' => 'italian',
                'maxCalories' => $allowed_calories ?? null ,
                //ethical constraint from database
                // 'maxAlcohol'=> 0,
                'minVitaminC' => $minVitaminC ?? null,
                'minZinc' => $minZinc ?? null,
                'maxSpice' => $maxSpice ?? null,
                'exclude_ingredients' => $exclude_ingredients ?? null,

                // 'instructionsRequired' => true,
                // 'fillIngredients' => true,
                // 'addRecipeNutrition' => true,
                'sort' => 'healthiness' ?? null,
                'maxAlcohol' => $maxAlcohol ?? null,
                'cuisine' => $request->input('cuisine'),
                'type' => $request->input('type'),
                'diet' => $request->input('diet'),
                'intolerances' => $intolerances ?? null,
            ]
        ];

        return $params;
        $response = $client->request('GET', 'https://api.spoonacular.com/recipes/complexSearch',$params);

        if($response->getStatusCode() == 200){
            return "Success: " . $response->getBody();
        } else {
            return "Error: " . $response->getStatusCode();
        }
    }
}
