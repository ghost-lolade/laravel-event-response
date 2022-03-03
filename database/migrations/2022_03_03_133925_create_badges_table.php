<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('value');
            $table->timestamps();
        });

        $data = [
            ['name' => 'Beginner', 'value' => 0],
            ['name' => 'Intermediate', 'value' => 4],
            ['name' => 'Advanced', 'value' => 8],
            ['name' => 'Master', 'value' => 10],
        ];

        DB::table('badges')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('badges');
    }
}
