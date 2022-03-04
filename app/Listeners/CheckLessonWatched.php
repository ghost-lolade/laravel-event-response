<?php

namespace App\Listeners;

use Event;
use App\Events\LessonWatched;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Achievement;
use App\Models\Badges;
use App\Events\AchievementUnlockedEvent;
use App\Events\BadgeUnlockedEvent;

class CheckLessonWatched
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
     * @param  \App\Events\LessonWatched  $event
     * @return void
     */
    public function handle(LessonWatched $event)
    {
        $count = $event->user->watched()->count();
        $user = $event->user;

        if(in_array($count, Achievement::LESSONS_WATCHED)){
            $achievement_name = Achievement::where(['value'=>$count, 'type'=>Achievement::TYPE[1]])->first('name');
            Event::dispatch(new AchievementUnlockedEvent($achievement_name, $user));
        }

        $user_achievements = $user->badges()->where('user_id', '=', $user->id)->get();
        $achievements_count = $user_achievements->count();

        if(in_array($achievements_count, Badges::BADGES_WON)) {
            $badge_name = Badges::where('value', '=', $achievements_count)->first('name');
            Event::dispatch(new BadgeUnlockedEvent($badge_name, $user));
        }
    }
}
