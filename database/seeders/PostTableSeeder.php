<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PostTableSeeder extends Seeder
{
    
    public function run(): void
    {
        $post = [
            ['tittle' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['tittle' => 'Tips Belajar Laravel', 'content' => 'Lorem Ipsum'],
            ['tittle' => 'Jadwal Latihna Workout Bulanan', 'content' => 'Lorem Ipsum'],
        ];
        DB::table('post')->insert($post);
    }
}
