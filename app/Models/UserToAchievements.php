<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToAchievements extends Model
{
    use HasFactory;

    protected $table = 'achievement_user';
    public $timestamps = false;
}
