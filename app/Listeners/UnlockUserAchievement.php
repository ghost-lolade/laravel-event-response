<?php

namespace App\Listeners;

use App\Events\AchievementUnlockedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

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
        //
    }
}
