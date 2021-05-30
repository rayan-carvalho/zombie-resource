<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        'name'              => 'Roupas',
        'description'       => 'Roupas',       

        ]);
        Category::create([
            'name'              => 'Armamentos',
            'description'       => 'Armamentos',        

        ]);
        Category::create([
            'name'              => 'Alimentos',
            'description'       => 'Alimentos',        

        ]);
    }
}
