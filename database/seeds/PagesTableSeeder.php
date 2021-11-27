<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Page::truncate();
              $page = [
                ['title' => 'Terms Of Service', 'slug' => 'terms-of-service', 'published' => '1', 'identifier' => 'terms_of_service'],
                ['title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'published' => '1', 'identifier' => 'privacy_policy'],
                ['title' => 'Brocer', 'slug' => 'brocer', 'published' => '1', 'identifier' => 'brocer'],
                ['title' => 'Currency', 'slug' => 'currency', 'published' => '1', 'identifier' => 'currency'],
                ['title' => 'Product', 'slug' => 'product', 'published' => '1', 'identifier' => 'product'],
          ];
      Page::insert($page);

    }
}
