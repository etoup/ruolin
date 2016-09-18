<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsCategoriesTable extends Migration
{
    const TBL_NAME = 'shows_categories';//路演分类表
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TBL_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',40);
            $table->tinyInteger('types',false,true);
            $table->tinyInteger('sort',false,true)->default(255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(self::TBL_NAME);
    }
}
