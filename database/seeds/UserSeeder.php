<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::create([
            'name'              => 'Administrador',
            'email'             => 'rayanbarroso@gmail.com',
            'password'          => bcrypt('123456'),   
            'phone'             => '(85) 4012-0000',
            'mobile'            => '(85) 99986-5815',
            'cep'               => '60762-376',
            'street'            => 'Rua Monte Líbado',
            'number'            => '946', 
            'district'          => 'Mondubim', 
            'city'              => 'Fortaleza', 
            'uf'                => 'CE', 
            'complement'        => 'Bloco 4 Apartamento 201',

        ]);
    }
}
