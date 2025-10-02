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
            ['tittle' => 'Belajar Laravel', 'content' => 'Lorem Ipsum', 'stok' => 3],
            ['tittle' => 'Tips Belajar Laravel', 'content' => 'Lorem Ipsum', 'stok' => 2],
            ['tittle' => 'Jadwal Latihna Workout Bulanan', 'content' => 'Lorem Ipsum', 'stok' => 2],
        ];
        DB::table('post')->insert($post);
    }
}
