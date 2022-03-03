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
        'type'
    ];

    const FIRST_LESSON_WATCHED = 1;
    const FIVE_LESSONS_WATCHED = 5;
    const TEN_LESSONS_WATCHED = 10;
    const TWENTY_FIVE_LESSONS_WATCHED = 25;
    const FIFTY_LESSONS_WATCHED = 50;

    // const LESSON_WATCHED = [
    //     'First Lesson Watched',
    //     '5 Lesson Watched',
    //     '10 Lesson Watched',
    //     '25 Lesson Watched',
    //     '50 Lesson Watched',
    // ];

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
}
