<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowsTable extends Migration
{
    const TBL_NAME = 'shows';//路演表
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TBL_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id',false,true);
            $table->integer('shows_categories_id',false,true);
            $table->string('original');//原图地址
            $table->string('thumbnail');//缩略图地址
            $table->string('video');//视频地址
            $table->string('title',100);
            $table->text('content');
            $table->tinyInteger('status',false,ture)->default(0);
            $table->smallInteger('hits');
            $table->smallInteger('likes');
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
