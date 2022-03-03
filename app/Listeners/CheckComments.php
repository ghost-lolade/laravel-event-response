<?php

namespace App\Listeners;

use Event;
use App\Events\CommentWritten;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Achievement;
use App\Models\Badges;
use App\Events\AchievementUnlockedEvent;
use App\Events\BadgeUnlockedEvent;

class CheckComments
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
     * @param  \App\Events\CommentWritten  $event
     * @return void
     */
    public function handle(CommentWritten $event)
    {
        $count = $event->comment->count();
        $user = $event->comment->user;

        if(in_array($count, Achievement::COMMENTS_WRITTEN)){
            $achievement_name = Achievement::where(['value'=>$count, 'type'=>Achievement::TYPE[0]])->first('name');
            Event::fire(new AchievementUnlockedEvent($achievement_name, $user));
        }

        $user_achievements = $user->badges()->where('user_id', '=', $user->id)-get();
        $achievements_count = $user_achievements->count();

        if(in_array($achievements_count, Badges::BADGES_WON)) {
            $badge_name = Badges::where('value', '=', $achievements_count)->first('name');
            Event::fire(new BadgeUnlockedEvent($badge_name, $user));
        }
    }
}
