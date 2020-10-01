<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogCaloriesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_calories_user', function (Blueprint $table) {
            $table->id();
            $table->integer('hasil');
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan']);
            $table->tinyInteger('berat_badan');
            $table->tinyInteger('tinggi_badan');
            $table->string('makanan', 100);
            $table->tinyInteger('calories');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('suggest_menu_id')->nullable();
            $table->foreign('suggest_menu_id')->references('id')->on('suggestion_menu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('log_calories_user', function (Blueprint $table) {
            $table->dropForeign('log_calories_user_suggest_menu_id_foreign');
        });
        Schema::dropIfExists('log_calories_user');
    }
}
