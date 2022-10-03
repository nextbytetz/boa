<?php

# namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegistrationPurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registration_purchases')->delete();
        
        \DB::table('registration_purchases')->insert(array (
            0 => 
            array (
                'id' => '1',
                'registration_id' => '1',
                'student_id' => '1',
                'created_at' => '2022-09-18 04:07:14',
                'updated_at' => '2022-09-18 04:07:14',
            ),
            1 => 
            array (
                'id' => '2',
                'registration_id' => '1',
                'student_id' => '1',
                'created_at' => '2022-09-18 04:10:40',
                'updated_at' => '2022-09-18 04:10:40',
            ),
            2 => 
            array (
                'id' => '3',
                'registration_id' => '1',
                'student_id' => '15',
                'created_at' => '2022-09-18 06:46:48',
                'updated_at' => '2022-09-18 06:46:48',
            ),
        ));
        
        
    }
}
