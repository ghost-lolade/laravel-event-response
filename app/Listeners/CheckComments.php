<?php

namespace App\Listeners;

use App\Events\CommentWritten;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Achievement;

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
        $count = count($event->comment);

        if(in_array($count, Achievement::COMMENTS_WRITTEN)){
            $achievement = Achievement::where(['value'=>$count, 'type'=>Achievement::TYPE[0]])->first('name');
            Event::fire(new AchievementUnlockedEvent($achievement, $event->comment->user));
        }
    }
}
