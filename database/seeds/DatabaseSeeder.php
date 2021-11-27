<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DashboardsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(NavigationTableSeeder::class);
        // $this->call(ArticletypeTableSeeder::class);

        // factory(\App\Models\Article::class, 10)->create();

    }
}
