<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;

    protected $table = 'badges';

    protected $fillable = [
        'name',
        'value'
    ];

    const BEGINNER = 0;
    const INTERMEDIATE = 4;
    const MASTER = 8;
    const ADVANCED = 10;

    const BADGES_WON = [0, 4, 8, 10];

    public function getBadgeIdByName($badge_name) {
        return self::where('name', "=", $badge_name)->first('id');  
    }

    public function getBadgesByValue($badge_value) {
        return self::where('value', '=', $badge_value)->first();
    }
}
