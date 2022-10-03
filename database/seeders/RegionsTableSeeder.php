<?php

# namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Database\TruncateTable;
use Database\DisableForeignKeys;

class RegionsTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $this->disableForeignKeys("regions");
        $this->delete('regions');
        
        DB::table('regions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Arusha',
                'country_id' => 1,
                'hasc' => 'ARS',
                'zone_id' => 4,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Dar es Salaam',
                'country_id' => 1,
                'hasc' => 'DSM',
                'zone_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Dodoma',
                'country_id' => 1,
                'hasc' => 'DOM',
                'zone_id' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Geita',
                'country_id' => 1,
                'hasc' => 'GTA',
                'zone_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Iringa',
                'country_id' => 1,
                'hasc' => 'IRG',
                'zone_id' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Kagera',
                'country_id' => 1,
                'hasc' => 'KGA',
                'zone_id' => 3,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Katavi',
                'country_id' => 1,
                'hasc' => 'TAV',
                'zone_id' => 7,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Kigoma',
                'country_id' => 1,
                'hasc' => 'KIG',
                'zone_id' => 7,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Kilimanjaro',
                'country_id' => 1,
                'hasc' => 'KLM',
                'zone_id' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Lindi',
                'country_id' => 1,
                'hasc' => 'LND',
                'zone_id' => 6,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Manyara',
                'country_id' => 1,
                'hasc' => 'MNY',
                'zone_id' => 4,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Mara',
                'country_id' => 1,
                'hasc' => 'MAR',
                'zone_id' => 3,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Mbeya',
                'country_id' => 1,
                'hasc' => 'MBY',
                'zone_id' => 5,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Morogoro',
                'country_id' => 1,
                'hasc' => 'MOR',
                'zone_id' => 2,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Mtwara',
                'country_id' => 1,
                'hasc' => 'MTW',
                'zone_id' => 6,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Mwanza',
                'country_id' => 1,
                'hasc' => 'MWZ',
                'zone_id' => 3,
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Njombe',
                'country_id' => 1,
                'hasc' => 'NJM',
                'zone_id' => 5,
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Pemba North',
                'country_id' => 1,
                'hasc' => 'PEN',
                'zone_id' => 2,
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Pemba South',
                'country_id' => 1,
                'hasc' => 'PES',
                'zone_id' => 2,
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Pwani',
                'country_id' => 1,
                'hasc' => 'PWN',
                'zone_id' => 2,
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Rukwa',
                'country_id' => 1,
                'hasc' => 'RKW',
                'zone_id' => 7,
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Ruvuma',
                'country_id' => 1,
                'hasc' => 'RVM',
                'zone_id' => 6,
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Shinyanga',
                'country_id' => 1,
                'hasc' => 'SHN',
                'zone_id' => 3,
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Simiyu',
                'country_id' => 1,
                'hasc' => 'SMY',
                'zone_id' => 3,
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Singida',
                'country_id' => 1,
                'hasc' => 'SND',
                'zone_id' => 1,
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Tabora',
                'country_id' => 1,
                'hasc' => 'TBR',
                'zone_id' => 1,
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Tanga',
                'country_id' => 1,
                'hasc' => 'TNG',
                'zone_id' => 4,
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Zanzibar North',
                'country_id' => 1,
                'hasc' => 'ZNN',
                'zone_id' => 2,
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Zanzibar South and Central',
                'country_id' => 1,
                'hasc' => 'ZSC',
                'zone_id' => 2,
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Zanzibar West',
                'country_id' => 1,
                'hasc' => 'ZNW',
                'zone_id' => 2,
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Songwe',
                'country_id' => 1,
                'hasc' => 'SNG',
                'zone_id' => 5,
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Unguja South',
                'country_id' => 1,
                'hasc' => 'UNS',
                'zone_id' => 2,
      
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Unguja North',
                'country_id' => 1,
                'hasc' => 'UNN',
                'zone_id' => 2,
            
            ),
        ));
        $this->enableForeignKeys("regions");
        
    }
}
