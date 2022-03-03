<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->int('value');
            $table->timestamps();
        });

        $data = [
            ['name' => 'First Comment Written', 'type' => 'Comments Written', 'value' => 1],
            ['name' => '3 Comments Written', 'type' => 'Comments Written', 'value' => 3],
            ['name' => '5 Comments Written', 'type' => 'Comments Written', 'value' => 5],
            ['name' => '10 Comments Written', 'type' => 'Comments Written', 'value' => 10],
            ['name' => '20 Comments Written', 'type' => 'Comments Written', 'value' => 20],
            ['name' => 'First Lesson Watched', 'type' => 'Lessons Watched', 'value' => 1],
            ['name' => '5 Lessons Watched', 'type' => 'Lessons Watched', 'value' => 5],
            ['name' => '10 Lessons Watched', 'type' => 'Lessons Watched', 'value' => 10],
            ['name' => '25 Lessons Watched', 'type' => 'Lessons Watched', 'value' => 25],
            ['name' => '50 Lessons Watched', 'type' => 'Lessons Watched', 'value' => 50]
        ];
        DB::table('achievements')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achievements');
    }
}
