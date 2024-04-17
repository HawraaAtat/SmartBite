<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        //fitbit
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
                "customHeart_rateZones" => [
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
                "heart_rateZones" => [
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
                "restingHeart_rate" => 77,
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

        // Get the calories that the user has eaten throughout the day and include it in the formula.
        // maybe food history
        $total_calories = $calories_goal + $total_calories_burned; // - eaten calories

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

        if($efficiency >= 85 && $hours_asleep >= 7 && $hours_asleep <= 9) {
            $sleep_quality = "good";
        } elseif($hours_asleep < 7) {
            $sleep_quality = "insufficient";
        } elseif($hours_asleep > 9) {
            $sleep_quality = "excessive";
        } elseif($hoursInBed > $hours_asleep + 1) { // If time in bed > sleep time
            $sleep_quality = "disturbed";
        } else {
            $sleep_quality = "poor";
        }

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

        if($breathing_rate >= 12 && $breathing_rate <= 20) {
            $breath_rate = "normal";
        } elseif($breathing_rate < 12) {
            $breath_rate = "insufficient";
        } else { // $breathing_rate > 20
            $breath_rate = "excessive";
        }

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

        if($averageHeart_rate >= 60 && $averageHeart_rate <= 100) {
            $heart_rate = "normal";
        } elseif($averageHeart_rate < 60) {
            $heart_rate = "low";
        } else { // if $averageHeart_rate > 100
            $heart_rate = "high";
        }

        //
        $now = now();
        $currentHour = $now->format('H');

        $coffee_status = "";

        if ($currentHour < 14) {
            $coffee_status = "good";
        } else {
            $coffee_status = "not a good";
        }


        //
        //formule

        echo $total_calories;
        echo "<br>";
        echo $most_recent_temperature;
        echo "<br>";
        echo $sleep_quality;
        echo "<br>";
        echo $breath_rate;
        echo "<br>";
        echo $heart_rate;
        echo "<br>";
        echo $coffee_status;
        echo "<br>";

        return;//ma badna edamam now
        //edamam
        $client = new Client(); // same client here and  in fitbit api. we move this up

        $params = [
            'query' => [
                'type' => 'public',
                'app_id' => '1022f7f6',
                'app_key' => 'c8622bf90a55c8bca73250db9b231fdc',
                'q' => 'avocado',
                'diet' => 'balanced'
                //params
            ]
        ];

        $response = $client->request('GET', 'https://api.edamam.com/api/recipes/v2', $params);

        if($response->getStatusCode() == 200){
            return "Success: " . $response->getBody();
        } else {
            return "Error: " . $response->getStatusCode();
        }
    }
}
