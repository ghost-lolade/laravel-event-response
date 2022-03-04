<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchievementsController;
use App\Models\Comment;
use App\Models\User;
use App\Events\CommentWritten;
use App\Models\Lesson;
use App\Events\LessonWatched;
use Illuminate\Support\Facades\Event;

Route::get('/users/{user}/achievements', [AchievementsController::class, 'index']);

Route::get('/test-comment-written', function() {
    
    $comment = Comment::factory()->create();

    Event::dispatch(new CommentWritten($comment));
});

Route::get('/test-lesson-watched', function() {

    $lesson = Lesson::factory()->create();
    $user = User::factory()->create();

    Event::dispatch(new LessonWatched($lesson, $user));
});
