<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '山田太郎',
            'email' => 'aa@gmail.com',
            'password' =>bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '佐藤次郎',
            'email' => 'bb@gmail.com',
            'password' => bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '鈴木三郎',
            'email' => 'cc@gmail.com',
            'password' =>bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '加藤花子',
            'email' => 'dd@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '井上陽子',
            'email' => 'ee@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);


        $param = [
            'name' => '山下ひろみ',
            'email' => 'ff@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '佐々木健一',
            'email' => 'gg@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '加藤良子',
            'email' => 'hh@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '吉田恵',
            'email' => 'ii@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '本田亮一',
            'email' => 'jj@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '斎藤まい',
            'email' => 'kk@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '竹下恵子',
            'email' => 'll@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '阿部貴子',
            'email' => 'mm@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '森田康夫',
            'email' => 'nn@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '松田栄子',
            'email' => 'oo@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '中野啓介',
            'email' => 'pp@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '橋本まりこ',
            'email' => 'qq@gmail.com',
            'password' =>
            bcrypt('password')
        ];
        DB::table('users')->insert($param);
    }
}
