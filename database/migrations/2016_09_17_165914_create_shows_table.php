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
            $table->integer('project_id');//项目名称，要参与路演的项目，根据user_id关联项目
            $table->string('purpose');//参与路演的预期目标
            $table->string('price');//参与路演的预期费用
            $table->string('program');//有无路演方案
            $table->string('area');//路演区域
            $table->tinyInteger('times',false,true);//路演场次。次数
            $table->string('scale');//路演规模
            $table->string('guest');//是否有大咖，嘉宾
            $table->tinyInteger('shows_categories_id',false,true);
            $table->string('original')->nullable();//原图地址
            $table->string('thumbnail')->nullable();//缩略图地址
            $table->string('video')->nullable();//视频地址
            $table->string('title',100)->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('hits')->default(0);
            $table->integer('likes')->default(0);
<<<<<<< HEAD
=======
=======
<<<<<<< HEAD:database/migrations/2016_09_17_165914_create_shows_table.php
            $table->integer('hits')->default(0);
            $table->integer('likes')->default(0);
=======
            $table->smallInteger('hits');
            $table->smallInteger('likes');
>>>>>>> 2aec690a33958ab141a1eb09144da793c7e140f1:database/migrations/2016_09_17_165911_create_shows_table.php
>>>>>>> 734652a658a650655775a7f6237beec51485af0a:database/migrations/2016_09_17_165914_create_shows_table.php
>>>>>>> 7ce6ef822428d84d48187570a7a12cbc33aca576
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
