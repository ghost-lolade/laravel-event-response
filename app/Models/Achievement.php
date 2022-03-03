<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'achievement';

    protected $fillable = [
        'name',
        'type',
        'value'
    ];

    const TYPE = ['Comments Written', 'Lessons Watched'];

    const FIRST_LESSON_WATCHED = 1;
    const FIVE_LESSONS_WATCHED = 5;
    const TEN_LESSONS_WATCHED = 10;
    const TWENTY_FIVE_LESSONS_WATCHED = 25;
    const FIFTY_LESSONS_WATCHED = 50;

    const FIRST_COMMENT_WRITTEN = 1;
    const THREE_COMMENTS_WRITTEN = 3;
    const FIVE_COMMENTS_WRITTEN = 5;
    const TEN_COMMENTS_WRITTEN = 10;
    const TWENTY_COMMENTS_WRITTEN = 20;

    const COMMENTS_WRITTEN = [
        FIRST_COMMENT_WRITTEN,
        THREE_COMMENTS_WRITTEN,
        FIVE_COMMENTS_WRITTEN,
        TEN_COMMENTS_WRITTEN,
        TWENTY_COMMENTS_WRITTEN
    ];

    const LESSONS_WATCHED = [
        FIRST_LESSON_WATCHED,
        FIVE_LESSONS_WATCHED,
        TEN_LESSONS_WATCHED,
        TWENTY_FIVE_LESSONS_WATCHED,
        FIFTY_LESSONS_WATCHED
    ];

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
