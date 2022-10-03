<?php

# namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => '1',
                'workspace_id' => '1',
                'first_name' => 'Maadhi',
                'last_name' => 'Rutajwaa',
                'email' => 'admin@demo.com',
                'phone_number' => NULL,
                'password_reset_key' => NULL,
                'mobile_number' => NULL,
                'twitter' => NULL,
                'facebook' => NULL,
                'linkedin' => NULL,
                'address_1' => NULL,
                'address_2' => NULL,
                'zip' => NULL,
                'city' => NULL,
                'state' => NULL,
                'country' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$3/55xWuspzWlv5ZlGMQ7Bu0rnZTBbhBncKT6zbLLKrYNAhQ/YrpQO',
                'last_login' => '2022-09-27 15:09:12',
                'language' => 'sw',
                'photo' => NULL,
                'cover_photo' => NULL,
                'super_admin' => '1',
                'last_conversion' => NULL,
                'last_conversion_ip' => NULL,
                'remember_token' => 'ityP2PZr4AZ4bcGYafcmfDa79zFdQ5dtSBJXYPimzIVoiQoKP86b3cXz5inW',
                'created_at' => '2022-08-14 05:21:01',
                'updated_at' => '2022-09-27 15:09:12',
            ),
        ));
        
        
    }
}
