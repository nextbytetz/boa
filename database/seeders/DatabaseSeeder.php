<?php

# namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use RegionsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
        $this->call([
            RegionsTableSeeder::class,
            $this->call(UsersTableSeeder::class),
            $this->call(StudentsTableSeeder::class),
            $this->call(CoursesTableSeeder::class),
            $this->call(CoursePurchasesTableSeeder::class),
            $this->call(LessonsTableSeeder::class),
            $this->call(OrdersTableSeeder::class),
            $this->call(RegistrationsTableSeeder::class),
            $this->call(RegistrationPurchasesTableSeeder::class),
          
        ]);
        $workspace = new Workspace();
        $workspace->name = 'CloudOnex';
        $workspace->save();

        $user = User::first();
        if(!$user)
        {
            $user = new User();
            $user->workspace_id = $workspace->id;
            $user->first_name = 'Jason';
            $user->last_name = 'M';
            $user->email = 'demo@nextbyte.com';
            $user->password = Hash::make('123456');
            $user->super_admin = 1;
            $user->save();

        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CoursePurchasesTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(RegistrationsTableSeeder::class);
        $this->call(RegistrationPurchasesTableSeeder::class);
        
    }

        $data = [
            'company_name'=> 'Nextbyte'
        ];

        foreach($data as $key=>$value){

            $setting =  new Setting();

            $setting->key = $key;
            $setting->workspace_id = $workspace->id;
            $setting->value = $value;
            $setting->save();
        }
    }
}
