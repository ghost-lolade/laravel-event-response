<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserToAchievements;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function index(User $user)
    {
        return $user_lesson;
        // return response()->json([
        //     'unlocked_achievements' => [],
        //     'next_available_achievements' => [],
        //     'current_badge' => '',
        //     'next_badge' => '',
        //     'remaing_to_unlock_next_badge' => 0
        // ]);
    }
}
