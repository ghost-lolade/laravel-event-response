<?php

namespace App\Listeners;

use App\Events\BadgeUnlockedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
