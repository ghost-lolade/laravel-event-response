<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToAchievements;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {

        $unlocked_achievements = [];
        $next_available_achievements = [];
        $next_available_achievements_value = [];
        $current_badge = '';
        $next_badge = '';
        $remaing_to_unlock_next_badge = 0;
        $next_value_1 = ''; //Next value of achievement for comments written type.
        $next_value_2 = '';//Next value of achievement for lessons watched type.

        $achievements = $user->unlocked_achievements()->get(); //getting all user unlocked achievements

        /* Looping through user achievements to get names and update the 
        next achievement for each type of achievement
         */
        foreach ($achievements as $achievement) {
            array_push($unlocked_achievements, $achievement->name);

            //getting the next achievement according to type.
            if($achievement->type == Achievement::TYPE[0]) {
                $next_value_1 = Achievement::where('value', '>', $achievement->value)->min('value');
                $type1 = $achievement->type;
            }
            elseif($achievement->type == Achievement::TYPE[1]) {
                $next_value_2 = Achievement::where('value', '>', $achievement->value)->min('value');
                $type2 = $achievement->type;
            }
            else {
                //making the first achievements for each type the default next values

                $next_value_1 = Achievement::where('type', '=', Achievement::TYPE[0])->first('value');
                $type1 = Achievement::TYPE[0];
                $next_value_2 = Achievement::where('type', '=', Achievement::TYPE[1])->first('value');
                $type2 = Achievement::TYPE[1];
            }
        }
        //using the values and type to fetch the next achievements, 
        $next_achievement_for_comments = Achievement::getAchievementByValueAndType($next_value_1, $type1);
        $next_achievement_for_lessons = Achievement::getAchievementByValueAndType($next_value_2, $type2);
        if($next_achievement_for_comments && $next_achievement_for_lessons)
            array_push($next_available_achievements, $next_achievement_for_comments->name, $next_achievement_for_lessons->name);

        return $next_available_achievements;
        // return response()->json([
        //     'unlocked_achievements' => $unlocked_achievements,
        //     'next_available_achievements' => $next_available_achievements,
        //     'current_badge' => '',
        //     'next_badge' => '',
        //     'remaing_to_unlock_next_badge' => 0
        // ]);
    }
}
