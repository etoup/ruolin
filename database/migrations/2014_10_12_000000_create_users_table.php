<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    const TBL_NAME = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TBL_NAME, function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid',80)->nullable();//openid
            $table->string('nickname',80)->nullable();//昵称
            $table->string('headimgurl')->nullable();//头像
            $table->tinyInteger('sex',false,true)->default(0);//性别
            $table->string('city',40)->nullable();//城市
            $table->string('province',40)->nullable();//省份
            $table->string('country',40)->nullable();//国家
            $table->string('language',20)->nullable();//语言
            $table->integer('subscribe_time',false,true)->nullable();//关注时间
            $table->string('name',40);//姓名
            $table->string('email',40)->unique();//email
            $table->char('mobile',11)->unique();//手机
            $table->string('my_code',80)->unique();//推荐码
            $table->integer('industry_id',false,true)->nullable();//行业ID
            $table->string('company',40)->nullable();//公司
            $table->string('position',40)->nullable();//职位
            $table->string('pay_password',80)->nullable();//支付密码
            $table->string('password',80);//登录密码
            $table->tinyInteger('roles',false,true)->default(10);//等级：10普通用户，80管理员
            $table->decimal('balance',10,2)->default('0.00');//余额
            $table->string('remark')->nullable();//备注
            $table->rememberToken();
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
