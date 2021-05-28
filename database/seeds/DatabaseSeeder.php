<?php

use App\Models\Admin\Company;
use App\Models\Admin\Category;
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
        $this->call(UserSeeder::class);  
    }
}
