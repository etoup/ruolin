<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsRelationshipsTable extends Migration
{
    const TBL_NAME = 'projects_relationships';//项目关系表
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
            $table->integer('projects_id',false,true);
            $table->tinyInteger('types',false,true);
            $table->timestamp('created_at');
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
