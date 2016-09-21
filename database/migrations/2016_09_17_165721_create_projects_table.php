<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    const TBL_NAME = 'projects';//项目表
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
            $table->string('name',40);//姓名
            $table->string('ways');//联系方式
            $table->char('card',18);//身份证
            $table->string('business_name',40);//企业名称
            $table->string('brand_name',40);//品牌名称
            $table->integer('regions_id',false,true);//地区ID
            $table->string('address');//详细地址
            $table->integer('industries_id',false,true);//行业ID
            $table->integer('quotas_id',false,true);//额度ID
            $table->boolean('has_stores');//是否有实体店
            $table->string('cycle',20);//收益回报期
            $table->string('information',40);//商户备案信息
            $table->string('characteristic',100);//项目特色
            $table->string('policy',100);//招商政策
            $table->string('describe');//品牌描述
            $table->tinyInteger('types',false,true);//类型
            $table->tinyInteger('status')->default(0);//类型
            $table->smallInteger('sort',false,true)->default(0);//排序
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
