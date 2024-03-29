<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRecipesSortedByDaysTable extends Migration
{
    public function up()
    {
        Schema::create('user_recipes_sorted_by_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('recipe_id');
            $table->tinyInteger('day_id');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('recipe_id')
                ->references('id')
                ->on('recipes')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_recipes_sorted_by_days');
    }
}
