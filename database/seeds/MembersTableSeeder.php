<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        if (env('DB_CONNECTION') == 'mysql') {
            DB::table(config('users.users_table'))->truncate();
        } elseif (env('DB_CONNECTION') == 'sqlite') {
            DB::statement('DELETE FROM ' . config('users.users_table'));
        } else {
            //For PostgreSQL or anything else
            DB::statement('TRUNCATE TABLE ' . config('users.users_table') . ' CASCADE');
        }

        //Add the master administrator, user id of 1
        $users = [
            [
                'openid'            => 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M',
                'nickname'          => 'Band',
                'headimgurl'        => 'http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0',
                'sex'               => 1,
                'city'              => '广州',
                'province'          => '广东',
                'country'           => '中国',
                'language'          => 'zh_CN',
                'subscribe_time'    => '1382694957',
                'name'              => 'Band',
                'email'             => 'Band@126.com',
                'mobile'            => '186778891',
                'my_code'           => 'o6_bmjrPTlm6_2sgVt7hMZOPfL2M',
                'industry_id'       => 1,
                'company'           => '公司名称',
                'position'          => 'CTO',
                'pay_password'      => bcrypt('1234'),
                'password'          => bcrypt('1234'),
                'roles'             => 10,
                'balance'           => 100.00,
                'remark'            => '',
                'created_at'        =>Carbon::now(),
                'updated_at'        =>Carbon::now()
            ],
            [
                'openid'            => 'o6_bmjrPTlm6_2sgVt7hMZOPfL2W',
                'nickname'          => 'Band1',
                'headimgurl'        => 'http://wx.qlogo.cn/mmopen/g3MonUZtNHkdmzicIlibx6iaFqAc56vxLSUfpb6n5WKSYVY0ChQKkiaJSgQ1dZuTOgvLLrhJbERQQ4eMsv84eavHiaiceqxibJxCfHe/0',
                'sex'               => 1,
                'city'              => '广州',
                'province'          => '广东',
                'country'           => '中国',
                'language'          => 'zh_CN',
                'subscribe_time'    => '1382694957',
                'name'              => 'Band1',
                'email'             => 'Band1@126.com',
                'mobile'            => '1867788911',
                'my_code'           => 'o6_bmjrPTlm6_2sgVt7hMZOPfL2W',
                'industry_id'       => 1,
                'company'           => '公司名称',
                'position'          => 'CTO',
                'pay_password'      => bcrypt('1234'),
                'password'          => bcrypt('1234'),
                'roles'             => 10,
                'balance'           => 100.00,
                'remark'            => '',
                'created_at'        =>Carbon::now(),
                'updated_at'        =>Carbon::now()
            ]
        ];

        DB::table(config('users.users_table'))->insert($users);

        if (env('DB_CONNECTION') == 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
