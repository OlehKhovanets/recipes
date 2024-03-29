<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->double('calories_per_gram', 5, 2);
            $table->boolean('is_approved')->default(true);
            $table->timestamps();

            $table->index('slug');
            $table->index('name');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
