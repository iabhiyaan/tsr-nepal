<?php

use Illuminate\Database\Seeder;
use App\Models\Navigation;

class NavigationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Navigation::truncate();

       $data = [
         ['id' => '1', 'name' => 'Home', 'slug' => 'home', 'table_name' => '', 'identifier' => 'home', 'parent' => '0', 'order' => '1', 'published' => '1'],

         ['id' => '2', 'name' => 'Market', 'slug' => 'market', 'table_name' => '', 'identifier' => 'market', 'parent' => '0', 'order' => '2', 'published' => '1'],


    //market child
         ['id' => '3', 'name' => 'Introduction', 'slug' => 'introductions', 'table_name' => '', 'identifier' => 'introduction_market', 'parent' => '2', 'order' => '1', 'published' => '1'],

         ['id' => '4', 'name' => 'Ipo', 'slug' => 'ipo', 'table_name' => '', 'identifier' => 'ipo', 'parent' => '2', 'order' => '2', 'published' => '1'],

         ['id' => '5', 'name' => 'Fpo', 'slug' => 'fpo', 'table_name' => '', 'identifier' => 'fpo', 'parent' => '2', 'order' => '3', 'published' => '1'],

         ['id' => '6', 'name' => 'Dividents', 'slug' => 'dividents', 'table_name' => '', 'identifier' => 'dividents', 'parent' => '2', 'order' => '4', 'published' => '1'],



         ['id' => '7', 'name' => 'News', 'slug' => 'news', 'identifier' => 'news', 'table_name' => '', 'parent' => '0', 'order' => '3', 'published' => '1'],


  //news child
         ['id' => '8', 'name' => 'Global', 'slug' => 'global', 'identifier' => 'global_news', 'table_name' => '', 'parent' => '7', 'order' => '1', 'published' => '1'],

         ['id' => '9', 'name' => 'Nepal', 'slug' => 'nepal', 'identifier' => 'nepali_news', 'table_name' => '', 'parent' => '7', 'order' => '2', 'published' => '1'],



         ['id' => '10', 'name' => 'Financial Instrument', 'slug' => 'financial-instrument', 'table_name' => '', 'identifier' => 'financial_instrument', 'parent' => '0', 'order' => '4', 'published' => '1'],


 //financial_instrument child
         ['id' => '11', 'name' => 'Nepali Stockes', 'slug' => 'nepali-stocks', 'table_name' => '', 'identifier' => 'nepali_stockes', 'parent' => '10', 'order' => '1', 'published' => '1'],

         ['id' => '12', 'name' => 'Global Stocks', 'slug' => 'global-stocks', 'table_name' => '', 'identifier' => 'global_stockes', 'parent' => '10', 'order' => '2', 'published' => '1'],


//Crypto Currency
        ['id' => '13', 'name' => 'Crypto Currency', 'slug' => 'crypto-currency', 'table_name' => '', 'identifier' => 'cryptocurrency', 'parent' => '0', 'order' => '5', 'published' => '1'],



        ['id' => '14', 'name' => 'Trading View', 'slug' => 'trading_view', 'table_name' => '', 'identifier' => 'tradingview', 'parent' => '0', 'order' => '6', 'published' => '1'],


        ['id' => '15', 'name' => 'Open Press', 'slug' => 'open_press', 'table_name' => '', 'identifier' => 'open_press', 'parent' => '0', 'order' => '7', 'published' => '1'],

  //open press child

        ['id' => '16', 'name' => 'Open Writings', 'slug' => 'open-writings', 'table_name' => '', 'identifier' => 'openwriting', 'parent' => '15', 'order' => '1', 'published' => '1'],

        ['id' => '17', 'name' => 'Hot Stock', 'slug' => 'hot-stock', 'table_name' => '', 'identifier' => 'hotstock', 'parent' => '15', 'order' => '2', 'published' => '1'],


        ['id' => '18', 'name' => 'Media', 'slug' => 'media', 'table_name' => '', 'identifier' => 'media', 'parent' => '0', 'order' => '8', 'published' => '1'],

  //media child
        ['id' => '19', 'name' => 'Video', 'slug' => 'video', 'table_name' => '', 'identifier' => 'video', 'parent' => '18', 'order' => '1', 'published' => '1'],


        ['id' => '20', 'name' => 'Podcast', 'slug' => 'podcast', 'table_name' => '', 'identifier' => 'podcast', 'parent' => '18', 'order' => '2', 'published' => '1'],


        ['id' => '21', 'name' => 'Useful Links', 'slug' => 'usefullinks', 'table_name' => '', 'identifier' => 'usefullinks', 'parent' => '0', 'order' => '9', 'published' => '1'],

//usefullinks child
        ['id' => '22', 'name' => 'Event Calendar (global)', 'slug' => 'event-calender-global', 'table_name' => '', 'identifier' => 'event_calender_global', 'parent' => '21', 'order' => '1', 'published' => '1'],

        ['id' => '23', 'name' => 'Manual Event Calendar (Nepal)', 'slug' => 'event-calender-nepal', 'table_name' => '', 'identifier' => 'event_calender_nepal', 'parent' => '21', 'order' => '2', 'published' => '1'],


//late update
        ['id' => '24', 'name' => 'Open Reading', 'slug' => 'open-reading', 'table_name' => '', 'identifier' => 'openreading', 'parent' => '15', 'order' => '3', 'published' => '1'],

       ];

       Navigation::insert($data);
    }
}
