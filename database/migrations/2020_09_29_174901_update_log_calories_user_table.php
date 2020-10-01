<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLogCaloriesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_calories_user', function($table) {
            $table->integer('berat_badan')->change();
            $table->integer('tinggi_badan')->change();
            $table->integer('calories')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_calories_user', function($table) {
            $table->tinyInteger('berat_badan')->change();
            $table->tinyInteger('tinggi_badan')->change();
            $table->tinyInteger('calories')->change();
        });    
    }
}
