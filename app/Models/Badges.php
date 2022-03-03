<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    use HasFactory;

    const BEGINNER = 0;
    const INTERMEDIATE = 4;
    const MASTER = 8;
    const ADVANCED = 10;
}
