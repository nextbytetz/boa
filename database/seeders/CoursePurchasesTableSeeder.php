<?php

# namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CoursePurchasesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_purchases')->delete();
        
        \DB::table('course_purchases')->insert(array (
            0 => 
            array (
                'id' => '1',
                'course_id' => '1',
                'student_id' => '1',
                'created_at' => '2022-09-18 04:10:40',
                'updated_at' => '2022-09-18 04:10:40',
            ),
            1 => 
            array (
                'id' => '2',
                'course_id' => '1',
                'student_id' => '15',
                'created_at' => '2022-09-18 06:46:48',
                'updated_at' => '2022-09-18 06:46:48',
            ),
        ));
        
        
    }
}
