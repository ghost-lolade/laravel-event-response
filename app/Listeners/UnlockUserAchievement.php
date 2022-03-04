<?php

namespace App\Listeners;

use App\Events\AchievementUnlockedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Models\Achievement;
use App\Models\UserToAchievement;

class UnlockUserAchievement
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AchievementUnlockedEvent  $event
     * @return void
     */
    public function handle(AchievementUnlockedEvent $event)
    {
        $user_id = $event->user->id;
        $achievement_id = Achievement::getAchievementIdByName($event->achievement_name);

        // Updating the database according if the AchievementUnlockedEvent is fired.
        $achievement = new UserToAchievement();
        $achievement->user_id = $user_id;
        $achievement->achievement_id = $achievement_id;
        $achievement->unlocked = true;
        $achievement->save();


    }
}
