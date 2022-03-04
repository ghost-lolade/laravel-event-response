<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Comment;
use App\Models\Lesson;
use App\Models\UserToAchievements;
use App\Events\CommentWritten;
use App\Events\LessonWatched;
use App\Events\AchievementUnlockedEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        
        $response = $this->get("/users/{$user->id}/achievements");

        $response->assertStatus(200);
        // Testing that the response returns expectred json structure.
        $response->assertJsonStructure([
            'unlocked_achievements',
            'next_available_achievements',
            'current_badge',
            'next_badge',
            'remaining_to_unlock_next_badge'
        ]);
    }

    public function testKeysDataType()
    {
        $user = User::factory()->create();
        
        $response = $this->get("/users/{$user->id}/achievements");

        $this->assertIsArray($response->getData()->unlocked_achievements);
        $this->assertIsArray($response->getData()->next_available_achievements);
        $this->assertIsString($response->getData()->current_badge);
        $this->assertIsString($response->getData()->next_badge);
        $this->assertIsInt($response->getData()->remaining_to_unlock_next_badge);
    }
    /* 
    *  The next two tests below will test CommentWritten and LessonWatched events which will in turn fire the
        AchievementUnlockedEvent and BadgesUnlockedEvent and will only assertDispatch when
        these two successfully dispatch
     */

    public function testCommentWrittenEvent()
    {
        Event::fake();
        $user = User::factory()->create();
        $response = $this->get("/users/{$user->id}/achievements");
        Event::assertDispatched(CommentWritten::class);
    }

    public function testLessonWatchedEvent()
    {
        Event::fake();
        $user = User::factory()->create();
        $response = $this->get("/users/{$user->id}/achievements");
        
        Event::assertDispatched(LessonWatched::class);
    }
}
