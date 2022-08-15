<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Achievement;
use App\Models\Badges;
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
        $remaining_to_unlock_next_badge = 0;
        // The next available achievements are First lesson watched and First Comments Written by default.
        $next_value_1 = Achievement::where('type', '=', Achievement::TYPE[0])->first()->value; 
        $next_value_2 = Achievement::where('type', '=', Achievement::TYPE[0])->first()->value;
        $type1 = Achievement::TYPE[0];
        $type2 = Achievement::TYPE[1];
        $current_badge_value = 0;


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
        }


        //using the values and type to fetch the next achievements.
        // It is certain that next available achievement will be two as there are two types of achievement.
        // If more a for loop would be a better solution to avoid repititon of codes.
        $next_achievement_for_comments = Achievement::getAchievementByValueAndType($next_value_1, $type1);
        $next_achievement_for_lessons = Achievement::getAchievementByValueAndType($next_value_2, $type2);
        if($next_achievement_for_comments && $next_achievement_for_lessons)
            array_push($next_available_achievements, $next_achievement_for_comments, $next_achievement_for_lessons);


        //geting all user badges
        $badges = $user->unlocked_badges()->get();

        //current badge is the last badge gotten by the user, since 0 achievement is Beginner then 
        //the current badge is Beginner.
        $current_badge = $badges->last() ? $badges->last()->name : Badges::getBadgesByValue($current_badge_value)->name;

        //getting next badge value, then getting the badge name
        $badge_value = $badges->last() ? $badges->last()->value : $current_badge_value;
        $next_badge_value = Badges::where('value', '>', $badge_value)->min('value');

        //  getting next badge by the next badge value
        $next_badge = Badges::getBadgesByValue($next_badge_value)->name;

        // Since badges are gotten by number of achievements, then subtracting the current number achievement from the
        //next_badge_value is a simple way of getting remaining_to_unock_next_badge.
        $remaining_to_unlock_next_badge =  $next_badge_value - count($achievements);
        
        return response()->json([
            'unlocked_achievements' => $unlocked_achievements,
            'next_available_achievements' => $next_available_achievements,
            'current_badge' => $current_badge,
            'next_badge' => $next_badge,
            'remaining_to_unlock_next_badge' => $remaining_to_unlock_next_badge
        ]);
    }
}
