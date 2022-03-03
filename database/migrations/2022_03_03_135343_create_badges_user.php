<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgesUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::dropIfExists('badge_user');
        Schema::create('badges_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('badges_id')->constrained();
            $table->boolean('unlocked')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges_user');
    }
}
