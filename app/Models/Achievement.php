<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'achievements';

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

    const COMMENTS_WRITTEN = [1, 5, 10, 25, 50];

    const LESSONS_WATCHED = [1, 3, 5, 10, 20];

    public function getAchievementIdByName($achievement_name) {
        return self::where('name', "=", $achievement_name)->first('id');
    }
    public function getAchievementByValueAndType($achievement_value, $type) {
        if($achievement_value == '' || $type == ''){
            return null;
        }
        return self::where(['value'=>$achievement_value, 'type'=>$type])->first('name');
    }
}
