<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params=[
            '勉強する',
            '掃除する',
            '市役所に行く',
            '買い物に行く'
        ];
        foreach ($params as $param) {
            DB::table('todos')->insert([
                'content' => $param
        ]);
        }
    }
}
