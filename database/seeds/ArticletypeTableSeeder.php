<?php

use Illuminate\Database\Seeder;
use App\Models\Articletype;
use Illuminate\Support\Facades\DB;

class ArticletypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Articletype::truncate();

        DB::table('articletypes')->delete();

        // $article = [
        //   ['title' => 'News', 'slug' => 'news', 'published' => 'Yes'],
        //   // ['title' => 'Analysis', 'slug' => 'analysis', 'published' => 'Yes'],
        //   ['title' => 'Interview', 'slug' => 'interview', 'published' => 'Yes'],
        //   ['title' => 'IPO News', 'slug' => 'ipo-news', 'published' => 'Yes'],
        // ];

        // Articletype::insert($article);
    }
}
