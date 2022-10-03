<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegistrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registrations')->delete();
        
        \DB::table('registrations')->insert(array (
            0 => 
            array (
                'id' => '1',
                'price' => '10000.00',
                'name' => 'Registration Fee',
                'description' => 'Fee for Bakwata Online Academy',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}