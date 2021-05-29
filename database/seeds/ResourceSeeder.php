<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Resource;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Resource::create([
            'name'              => 'Jaqueta',
            'minimum'           => '5',
            'category_id'       => '1',
        ]);

        Resource::create([
            'name'              => 'Rifle Calibre 22',
            'minimum'           => '5',
            'category_id'       => '2',
        ]);
    }
}
