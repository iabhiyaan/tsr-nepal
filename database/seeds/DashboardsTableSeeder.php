<?php

use Illuminate\Database\Seeder;
use App\Models\Dashboard;

class DashboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dashboard::truncate();
        $dashboard = [
          'site_name' => 'The Southeren Rock',
        ];
        Dashboard::create($dashboard);
    }
}
