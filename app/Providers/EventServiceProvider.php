<?php

namespace App\Providers;

use App\Events\LessonWatched;
use App\Events\CommentWritten;
use App\Events\AchievementUnlockedEvent;
use App\Events\BadgeUnlockedEvent;
use App\Listeners\CheckComments;
use App\Listeners\CheckLessonWatched;
use App\Listeners\UnlockUserAchievement;
use App\Listeners\UnlockUserBadge;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CommentWritten::class => [
            CheckComments::class,
        ],
        LessonWatched::class => [
            CheckLessonWatched::class,
        ],
        AchievementUnlockedEvent::class => [
            UnlockUserAchievement::class,
        ],
        BadgeUnlockedEvent::class => [
            UnlockUserBadge::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
