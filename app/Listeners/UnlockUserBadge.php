<?php

namespace App\Listeners;

use App\Events\BadgeUnlockedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\UserToBadges;
use App\Models\Badges;

class UnlockUserBadge
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
     * @param  \App\Events\BadgeUnlockedEvent  $event
     * @return void
     */
    public function handle(BadgeUnlockedEvent $event)
    {
        $user_id = $event->user->id;
        $badge_id = Badges::getBadgeIdByName($event->badge_name);

        $badge = new UserToBadges();
        $badge->user_id = $user_id;
        $badge->badges_id = $badge_id ? $badge_id : 1;
        $badge->unlocked = true;
        $badge->save();
    }
}
