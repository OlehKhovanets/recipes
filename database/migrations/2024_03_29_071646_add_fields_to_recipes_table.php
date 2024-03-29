<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToRecipesTable extends Migration
{
    public function up()
    {
            Schema::table('recipes', function (Blueprint $table) {
                $table->integer('type_of_meal')->after('created_at');
                $table->integer('number_of_servings')->after('created_at');
            });
    }

    public function down()
    {
    }
}
