<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $data = [

          ['id' => '1', 'name' => 'Market Introduction', 'slug' => 'market-introductions', 'table_name' => 'allarticles', 'identifier' => 'introduction_market', 'published' => 'Yes'],

          ['id' => '2', 'name' => 'Ipo', 'slug' => 'ipo', 'table_name' => 'allarticles', 'identifier' => 'ipo', 'published' => 'Yes'],

          ['id' => '3', 'name' => 'Fpo', 'slug' => 'fpo', 'table_name' => 'allarticles', 'identifier' => 'fpo', 'published' => 'Yes'],

          ['id' => '4', 'name' => 'Dividents', 'slug' => 'dividents', 'table_name' => 'allarticles', 'identifier' => 'dividents', 'published' => 'Yes'],



          // ['id' => '7', 'name' => 'News', 'slug' => 'news', 'identifier' => 'news', 'table_name' => '', 'parent' => '0', 'order' => '3', 'published' => '1'],


    //news child
          ['id' => '5', 'name' => 'Global News', 'slug' => 'global-news', 'identifier' => 'global_news', 'table_name' => 'allarticles', 'published' => 'Yes'],

          ['id' => '6', 'name' => 'Nepal News', 'slug' => 'nepali-news', 'identifier' => 'nepali_news', 'table_name' => 'allarticles', 'published' => 'Yes'],


          // ['id' => '7', 'name' => 'Financial Instrument', 'slug' => 'financial-instrument', 'table_name' => '', 'identifier' => 'financial_instrument', 'parent' => '0', 'order' => '4', 'published' => '1'],


    //financial_instrument child
          ['id' => '7', 'name' => 'Nepali Stockes', 'slug' => 'nepali-stocks', 'table_name' => 'allarticles', 'identifier' => 'nepali_stockes', 'published' => 'Yes'],

          ['id' => '8', 'name' => 'Global Stocks', 'slug' => 'global-stocks', 'table_name' => 'allarticles', 'identifier' => 'global_stockes', 'published' => 'Yes'],


    //Crypto Currency
         // ['id' => '13', 'name' => 'Crypto Currency', 'slug' => 'crypto-currency', 'table_name' => '', 'identifier' => 'cryptocurrency', 'parent' => '0', 'order' => '5', 'published' => '1'],



         // ['id' => '14', 'name' => 'Trading View', 'slug' => 'trading_view', 'table_name' => '', 'identifier' => 'tradingview', 'parent' => '0', 'order' => '6', 'published' => '1'],


         // ['id' => '15', 'name' => 'Open Press', 'slug' => 'open_press', 'table_name' => '', 'identifier' => 'open_press', 'parent' => '0', 'order' => '7', 'published' => '1'],

    //open press child

         // ['id' => '16', 'name' => 'Open Writings', 'slug' => 'open-writings', 'table_name' => '', 'identifier' => 'openwriting', 'parent' => '15', 'order' => '1', 'published' => '1'],

         // ['id' => '17', 'name' => 'Hot Stock', 'slug' => 'hot-stock', 'table_name' => '', 'identifier' => 'hotstock', 'parent' => '15', 'order' => '2', 'published' => '1'],


         // ['id' => '18', 'name' => 'Media', 'slug' => 'media', 'table_name' => '', 'identifier' => 'media', 'parent' => '0', 'order' => '8', 'published' => '1'],

    //media child
         // ['id' => '19', 'name' => 'Video', 'slug' => 'video', 'table_name' => '', 'identifier' => 'video', 'parent' => '18', 'order' => '1', 'published' => '1'],


         // ['id' => '20', 'name' => 'Podcast', 'slug' => 'podcast', 'table_name' => '', 'identifier' => 'podcast', 'parent' => '18', 'order' => '2', 'published' => '1'],


         // ['id' => '21', 'name' => 'Useful Links', 'slug' => 'usefullinks', 'table_name' => '', 'identifier' => 'usefullinks', 'parent' => '0', 'order' => '9', 'published' => '1'],

    //usefullinks child
         // ['id' => '22', 'name' => 'Event Calendar (global)', 'slug' => 'event-calender-global', 'table_name' => '', 'identifier' => 'event_calender_global', 'parent' => '21', 'order' => '1', 'published' => '1'],

         // ['id' => '23', 'name' => 'Manual Event Calendar (Nepal)', 'slug' => 'event-calender-nepal', 'table_name' => '', 'identifier' => 'event_calender_nepal', 'parent' => '21', 'order' => '2', 'published' => '1'],

       ];

       Category::insert($data);


    }
}
