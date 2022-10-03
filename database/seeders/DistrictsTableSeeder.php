<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        
        \DB::table('districts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'region_id' => 1,
                'name' => 'Meru',
            ),
            1 => 
            array (
                'id' => 2,
                'region_id' => 1,
                'name' => 'Arusha City',
            ),
            2 => 
            array (
                'id' => 3,
                'region_id' => 1,
                'name' => 'Arusha District',
            ),
            3 => 
            array (
                'id' => 4,
                'region_id' => 1,
                'name' => 'Karatu',
            ),
            4 => 
            array (
                'id' => 5,
                'region_id' => 1,
                'name' => 'Longido',
            ),
            5 => 
            array (
                'id' => 6,
                'region_id' => 1,
                'name' => 'Monduli',
            ),
            6 => 
            array (
                'id' => 7,
                'region_id' => 1,
                'name' => 'Ngorongoro',
            ),
            7 => 
            array (
                'id' => 8,
                'region_id' => 2,
                'name' => 'Ilala',
            ),
            8 => 
            array (
                'id' => 9,
                'region_id' => 2,
                'name' => 'Kinondoni',
            ),
            9 => 
            array (
                'id' => 10,
                'region_id' => 2,
                'name' => 'Temeke',
            ),
            10 => 
            array (
                'id' => 11,
                'region_id' => 2,
                'name' => 'Kigamboni',
            ),
            11 => 
            array (
                'id' => 12,
                'region_id' => 2,
                'name' => 'Ubungo',
            ),
            12 => 
            array (
                'id' => 13,
                'region_id' => 3,
                'name' => 'Bahi',
            ),
            13 => 
            array (
                'id' => 14,
                'region_id' => 3,
                'name' => 'Chamwino',
            ),
            14 => 
            array (
                'id' => 15,
                'region_id' => 3,
                'name' => 'Chemba',
            ),
            15 => 
            array (
                'id' => 16,
                'region_id' => 3,
                'name' => 'Dodoma Municipal',
            ),
            16 => 
            array (
                'id' => 17,
                'region_id' => 3,
                'name' => 'Kondoa',
            ),
            17 => 
            array (
                'id' => 18,
                'region_id' => 3,
                'name' => 'Kongwa',
            ),
            18 => 
            array (
                'id' => 19,
                'region_id' => 3,
                'name' => 'Mpwapwa',
            ),
            19 => 
            array (
                'id' => 20,
                'region_id' => 4,
                'name' => 'Bukombe',
            ),
            20 => 
            array (
                'id' => 21,
                'region_id' => 4,
                'name' => 'Chato',
            ),
            21 => 
            array (
                'id' => 22,
                'region_id' => 4,
                'name' => 'Geita Town Council & Geita District Council',
            ),
            22 => 
            array (
                'id' => 23,
                'region_id' => 4,
                'name' => 'Mbogwe',
            ),
            23 => 
            array (
                'id' => 24,
                'region_id' => 4,
                'name' => 'Nyang\'hwale',
            ),
            24 => 
            array (
                'id' => 25,
                'region_id' => 5,
                'name' => 'Iringa District',
            ),
            25 => 
            array (
                'id' => 26,
                'region_id' => 5,
                'name' => 'Iringa Municipal',
            ),
            26 => 
            array (
                'id' => 27,
                'region_id' => 5,
                'name' => 'Kilolo',
            ),
            27 => 
            array (
                'id' => 28,
                'region_id' => 5,
                'name' => 'Mafinga Town',
            ),
            28 => 
            array (
                'id' => 29,
                'region_id' => 5,
                'name' => 'Mufindi',
            ),
            29 => 
            array (
                'id' => 30,
                'region_id' => 6,
                'name' => 'Biharamulo',
            ),
            30 => 
            array (
                'id' => 31,
                'region_id' => 6,
                'name' => 'Bukoba',
            ),
            31 => 
            array (
                'id' => 32,
                'region_id' => 6,
                'name' => 'Bukoba Municipal',
            ),
            32 => 
            array (
                'id' => 33,
                'region_id' => 6,
                'name' => 'Karagwe',
            ),
            33 => 
            array (
                'id' => 34,
                'region_id' => 6,
                'name' => 'Kyerwa',
            ),
            34 => 
            array (
                'id' => 35,
                'region_id' => 6,
                'name' => 'Missenyi',
            ),
            35 => 
            array (
                'id' => 36,
                'region_id' => 6,
                'name' => 'Muleba',
            ),
            36 => 
            array (
                'id' => 37,
                'region_id' => 6,
                'name' => 'Ngara',
            ),
            37 => 
            array (
                'id' => 38,
                'region_id' => 7,
                'name' => 'Mlele',
            ),
            38 => 
            array (
                'id' => 39,
                'region_id' => 7,
                'name' => 'Mpanda',
            ),
            39 => 
            array (
                'id' => 40,
                'region_id' => 7,
                'name' => 'Mpanda Town',
            ),
            40 => 
            array (
                'id' => 41,
                'region_id' => 8,
                'name' => 'Buhigwe',
            ),
            41 => 
            array (
                'id' => 42,
                'region_id' => 8,
                'name' => 'Kakonko',
            ),
            42 => 
            array (
                'id' => 43,
                'region_id' => 8,
                'name' => 'Kasulu District',
            ),
            43 => 
            array (
                'id' => 44,
                'region_id' => 8,
                'name' => 'Kasulu Town',
            ),
            44 => 
            array (
                'id' => 45,
                'region_id' => 8,
                'name' => 'Kibondo',
            ),
            45 => 
            array (
                'id' => 46,
                'region_id' => 8,
                'name' => 'Kigoma District',
            ),
            46 => 
            array (
                'id' => 47,
                'region_id' => 8,
                'name' => 'Kigoma-Ujiji Municipal',
            ),
            47 => 
            array (
                'id' => 48,
                'region_id' => 8,
                'name' => 'Uvinza',
            ),
            48 => 
            array (
                'id' => 49,
                'region_id' => 9,
                'name' => 'Hai',
            ),
            49 => 
            array (
                'id' => 50,
                'region_id' => 9,
                'name' => 'Moshi District',
            ),
            50 => 
            array (
                'id' => 51,
                'region_id' => 9,
                'name' => 'Moshi Municipal',
            ),
            51 => 
            array (
                'id' => 52,
                'region_id' => 9,
                'name' => 'Mwanga',
            ),
            52 => 
            array (
                'id' => 53,
                'region_id' => 9,
                'name' => 'Rombo',
            ),
            53 => 
            array (
                'id' => 54,
                'region_id' => 9,
                'name' => 'Same',
            ),
            54 => 
            array (
                'id' => 55,
                'region_id' => 9,
                'name' => 'Siha',
            ),
            55 => 
            array (
                'id' => 56,
                'region_id' => 10,
                'name' => 'Kilwa',
            ),
            56 => 
            array (
                'id' => 57,
                'region_id' => 10,
                'name' => 'Lindi District',
            ),
            57 => 
            array (
                'id' => 58,
                'region_id' => 10,
                'name' => 'Lindi Municipal',
            ),
            58 => 
            array (
                'id' => 59,
                'region_id' => 10,
                'name' => 'Liwale',
            ),
            59 => 
            array (
                'id' => 60,
                'region_id' => 10,
                'name' => 'Nachingwea',
            ),
            60 => 
            array (
                'id' => 61,
                'region_id' => 10,
                'name' => 'Ruangwa',
            ),
            61 => 
            array (
                'id' => 62,
                'region_id' => 11,
                'name' => 'Babati Town',
            ),
            62 => 
            array (
                'id' => 63,
                'region_id' => 11,
                'name' => 'Babati District',
            ),
            63 => 
            array (
                'id' => 64,
                'region_id' => 11,
                'name' => 'Hanang',
            ),
            64 => 
            array (
                'id' => 65,
                'region_id' => 11,
                'name' => 'Kiteto',
            ),
            65 => 
            array (
                'id' => 66,
                'region_id' => 11,
                'name' => 'Mbulu',
            ),
            66 => 
            array (
                'id' => 67,
                'region_id' => 11,
                'name' => 'Simanjiro',
            ),
            67 => 
            array (
                'id' => 68,
                'region_id' => 12,
                'name' => 'Bunda',
            ),
            68 => 
            array (
                'id' => 69,
                'region_id' => 12,
                'name' => 'Butiama',
            ),
            69 => 
            array (
                'id' => 70,
                'region_id' => 12,
                'name' => 'Musoma District',
            ),
            70 => 
            array (
                'id' => 71,
                'region_id' => 12,
                'name' => 'Musoma Municipal',
            ),
            71 => 
            array (
                'id' => 72,
                'region_id' => 12,
                'name' => 'Rorya',
            ),
            72 => 
            array (
                'id' => 73,
                'region_id' => 12,
                'name' => 'Serengeti',
            ),
            73 => 
            array (
                'id' => 74,
                'region_id' => 12,
                'name' => 'Tarime',
            ),
            74 => 
            array (
                'id' => 75,
                'region_id' => 13,
                'name' => 'Busokelo',
            ),
            75 => 
            array (
                'id' => 76,
                'region_id' => 13,
                'name' => 'Chunya',
            ),
            76 => 
            array (
                'id' => 77,
                'region_id' => 13,
                'name' => 'Kyela',
            ),
            77 => 
            array (
                'id' => 78,
                'region_id' => 13,
                'name' => 'Mbarali',
            ),
            78 => 
            array (
                'id' => 79,
                'region_id' => 13,
                'name' => 'Mbeya City',
            ),
            79 => 
            array (
                'id' => 80,
                'region_id' => 13,
                'name' => 'Mbeya District',
            ),
            80 => 
            array (
                'id' => 81,
                'region_id' => 13,
                'name' => 'Rungwe',
            ),
            81 => 
            array (
                'id' => 82,
                'region_id' => 14,
                'name' => 'Gairo',
            ),
            82 => 
            array (
                'id' => 83,
                'region_id' => 14,
                'name' => 'Kilombero',
            ),
            83 => 
            array (
                'id' => 84,
                'region_id' => 14,
                'name' => 'Kilosa',
            ),
            84 => 
            array (
                'id' => 85,
                'region_id' => 14,
                'name' => 'Morogoro District',
            ),
            85 => 
            array (
                'id' => 86,
                'region_id' => 14,
                'name' => 'Morogoro Municipal',
            ),
            86 => 
            array (
                'id' => 87,
                'region_id' => 14,
                'name' => 'Mvomero',
            ),
            87 => 
            array (
                'id' => 88,
                'region_id' => 14,
                'name' => 'Ulanga',
            ),
            88 => 
            array (
                'id' => 89,
                'region_id' => 15,
                'name' => 'Masasi District',
            ),
            89 => 
            array (
                'id' => 90,
                'region_id' => 15,
                'name' => 'Masasi Town',
            ),
            90 => 
            array (
                'id' => 91,
                'region_id' => 15,
                'name' => 'Mtwara District',
            ),
            91 => 
            array (
                'id' => 92,
                'region_id' => 15,
                'name' => 'Mtwara Municipal',
            ),
            92 => 
            array (
                'id' => 93,
                'region_id' => 15,
                'name' => 'Nanyumbu',
            ),
            93 => 
            array (
                'id' => 94,
                'region_id' => 15,
                'name' => 'Newala',
            ),
            94 => 
            array (
                'id' => 95,
                'region_id' => 15,
                'name' => 'Tandahimba',
            ),
            95 => 
            array (
                'id' => 96,
                'region_id' => 16,
                'name' => 'Ilemela',
            ),
            96 => 
            array (
                'id' => 97,
                'region_id' => 16,
                'name' => 'Kwimba',
            ),
            97 => 
            array (
                'id' => 98,
                'region_id' => 16,
                'name' => 'Magu',
            ),
            98 => 
            array (
                'id' => 99,
                'region_id' => 16,
                'name' => 'Misungwi',
            ),
            99 => 
            array (
                'id' => 100,
                'region_id' => 16,
                'name' => 'Nyamagana',
            ),
            100 => 
            array (
                'id' => 101,
                'region_id' => 16,
                'name' => 'Sengerema',
            ),
            101 => 
            array (
                'id' => 102,
                'region_id' => 16,
                'name' => 'Ukerewe',
            ),
            102 => 
            array (
                'id' => 103,
                'region_id' => 32,
                'name' => 'Kati',
            ),
            103 => 
            array (
                'id' => 104,
                'region_id' => 32,
                'name' => 'Kusini',
            ),
            104 => 
            array (
                'id' => 105,
                'region_id' => 30,
                'name' => 'Magharibi',
            ),
            105 => 
            array (
                'id' => 106,
                'region_id' => 30,
                'name' => 'Mjini',
            ),
            106 => 
            array (
                'id' => 107,
                'region_id' => 33,
                'name' => 'Kaskazini A',
            ),
            107 => 
            array (
                'id' => 108,
                'region_id' => 33,
                'name' => 'Kaskazini B',
            ),
            108 => 
            array (
                'id' => 109,
                'region_id' => 18,
                'name' => 'Micheweni',
            ),
            109 => 
            array (
                'id' => 110,
                'region_id' => 18,
                'name' => 'Wete',
            ),
            110 => 
            array (
                'id' => 111,
                'region_id' => 19,
                'name' => 'Chake Chake',
            ),
            111 => 
            array (
                'id' => 112,
                'region_id' => 19,
                'name' => 'Mkoani',
            ),
            112 => 
            array (
                'id' => 113,
                'region_id' => 17,
                'name' => 'Ludewa',
            ),
            113 => 
            array (
                'id' => 114,
                'region_id' => 17,
                'name' => 'Makambako',
            ),
            114 => 
            array (
                'id' => 115,
                'region_id' => 17,
                'name' => 'Makete',
            ),
            115 => 
            array (
                'id' => 116,
                'region_id' => 17,
                'name' => 'Njombe District',
            ),
            116 => 
            array (
                'id' => 117,
                'region_id' => 17,
                'name' => 'Njombe Town',
            ),
            117 => 
            array (
                'id' => 118,
                'region_id' => 17,
                'name' => 'Wanging\'ombe',
            ),
            118 => 
            array (
                'id' => 119,
                'region_id' => 20,
                'name' => 'Bagamoyo',
            ),
            119 => 
            array (
                'id' => 120,
                'region_id' => 20,
                'name' => 'Kibaha District',
            ),
            120 => 
            array (
                'id' => 121,
                'region_id' => 20,
                'name' => 'Kibaha Town',
            ),
            121 => 
            array (
                'id' => 122,
                'region_id' => 20,
                'name' => 'Kisarawe',
            ),
            122 => 
            array (
                'id' => 123,
                'region_id' => 20,
                'name' => 'Mafia',
            ),
            123 => 
            array (
                'id' => 124,
                'region_id' => 20,
                'name' => 'Mkuranga',
            ),
            124 => 
            array (
                'id' => 125,
                'region_id' => 20,
                'name' => 'Rufiji',
            ),
            125 => 
            array (
                'id' => 126,
                'region_id' => 21,
                'name' => 'Kalambo',
            ),
            126 => 
            array (
                'id' => 127,
                'region_id' => 21,
                'name' => 'Nkasi',
            ),
            127 => 
            array (
                'id' => 128,
                'region_id' => 21,
                'name' => 'Sumbawanga District',
            ),
            128 => 
            array (
                'id' => 129,
                'region_id' => 21,
                'name' => 'Sumbawanga Municipal',
            ),
            129 => 
            array (
                'id' => 130,
                'region_id' => 22,
                'name' => 'Mbinga',
            ),
            130 => 
            array (
                'id' => 131,
                'region_id' => 22,
                'name' => 'Songea District',
            ),
            131 => 
            array (
                'id' => 132,
                'region_id' => 22,
                'name' => 'Songea Municipal',
            ),
            132 => 
            array (
                'id' => 133,
                'region_id' => 22,
                'name' => 'Tunduru',
            ),
            133 => 
            array (
                'id' => 134,
                'region_id' => 22,
                'name' => 'Namtumbo',
            ),
            134 => 
            array (
                'id' => 135,
                'region_id' => 22,
                'name' => 'Nyasa',
            ),
            135 => 
            array (
                'id' => 136,
                'region_id' => 24,
                'name' => 'Bariadi',
            ),
            136 => 
            array (
                'id' => 137,
                'region_id' => 24,
                'name' => 'Busega',
            ),
            137 => 
            array (
                'id' => 138,
                'region_id' => 24,
                'name' => 'Itilima',
            ),
            138 => 
            array (
                'id' => 139,
                'region_id' => 24,
                'name' => 'Maswa',
            ),
            139 => 
            array (
                'id' => 140,
                'region_id' => 24,
                'name' => 'Meatu',
            ),
            140 => 
            array (
                'id' => 141,
                'region_id' => 25,
                'name' => 'Ikungi',
            ),
            141 => 
            array (
                'id' => 142,
                'region_id' => 25,
                'name' => 'Iramba',
            ),
            142 => 
            array (
                'id' => 143,
                'region_id' => 25,
                'name' => 'Manyoni',
            ),
            143 => 
            array (
                'id' => 144,
                'region_id' => 25,
                'name' => 'Mkalama',
            ),
            144 => 
            array (
                'id' => 145,
                'region_id' => 25,
                'name' => 'Singida District',
            ),
            145 => 
            array (
                'id' => 146,
                'region_id' => 25,
                'name' => 'Singida Municipal',
            ),
            146 => 
            array (
                'id' => 147,
                'region_id' => 26,
                'name' => 'Igunga',
            ),
            147 => 
            array (
                'id' => 148,
                'region_id' => 26,
                'name' => 'Kaliua',
            ),
            148 => 
            array (
                'id' => 149,
                'region_id' => 26,
                'name' => 'Nzega',
            ),
            149 => 
            array (
                'id' => 150,
                'region_id' => 26,
                'name' => 'Sikonge',
            ),
            150 => 
            array (
                'id' => 151,
                'region_id' => 26,
                'name' => 'Tabora Municipal',
            ),
            151 => 
            array (
                'id' => 152,
                'region_id' => 26,
                'name' => 'Urambo',
            ),
            152 => 
            array (
                'id' => 153,
                'region_id' => 26,
                'name' => 'Uyui',
            ),
            153 => 
            array (
                'id' => 154,
                'region_id' => 27,
                'name' => 'Handeni District',
            ),
            154 => 
            array (
                'id' => 155,
                'region_id' => 27,
                'name' => 'Handeni Town',
            ),
            155 => 
            array (
                'id' => 156,
                'region_id' => 27,
                'name' => 'Kilindi',
            ),
            156 => 
            array (
                'id' => 157,
                'region_id' => 27,
                'name' => 'Korogwe Town',
            ),
            157 => 
            array (
                'id' => 158,
                'region_id' => 27,
                'name' => 'Korogwe District',
            ),
            158 => 
            array (
                'id' => 159,
                'region_id' => 27,
                'name' => 'Lushoto',
            ),
            159 => 
            array (
                'id' => 160,
                'region_id' => 27,
                'name' => 'Muheza',
            ),
            160 => 
            array (
                'id' => 161,
                'region_id' => 27,
                'name' => 'Mkinga',
            ),
            161 => 
            array (
                'id' => 162,
                'region_id' => 27,
                'name' => 'Pangani',
            ),
            162 => 
            array (
                'id' => 163,
                'region_id' => 27,
                'name' => 'Tanga City',
            ),
            163 => 
            array (
                'id' => 164,
                'region_id' => 23,
                'name' => 'Kahama Town',
            ),
            164 => 
            array (
                'id' => 165,
                'region_id' => 23,
                'name' => 'Kahama District',
            ),
            165 => 
            array (
                'id' => 166,
                'region_id' => 23,
                'name' => 'Kishapu',
            ),
            166 => 
            array (
                'id' => 167,
                'region_id' => 23,
                'name' => 'Shinyanga District',
            ),
            167 => 
            array (
                'id' => 168,
                'region_id' => 23,
                'name' => 'Shinyanga Municipal',
            ),
            168 => 
            array (
                'id' => 169,
                'region_id' => 31,
                'name' => 'Songwe',
            ),
            169 => 
            array (
                'id' => 170,
                'region_id' => 31,
                'name' => 'Mbozi',
            ),
            170 => 
            array (
                'id' => 171,
                'region_id' => 31,
                'name' => 'Ileje',
            ),
            171 => 
            array (
                'id' => 172,
                'region_id' => 31,
                'name' => 'Momba',
            ),
        ));

    }
}
