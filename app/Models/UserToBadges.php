<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToBadges extends Model
{
    use HasFactory;
    protected $table = 'badges_user';
    public $timestamps = false;
}
