<?php

# namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('lessons')->delete();
        
        \DB::table('lessons')->insert(array (
            0 => 
            array (
                'id' => '2',
                'workspace_id' => '1',
                'course_id' => '12',
                'title' => 'SOMO LA KOZI YA LUGHA YA KIARABU',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Kiarabu ni chanzo cha mafunzo ya uislam kwani vitabu vya kale vimeandikwa kwa kiarabu na mtume Muhammad Rehema za Allah aliyetakasika alikuwa mwarabu na aliyeongea kiarabu. Uislam ni dini ya ulimwengu na Qur’an imenakiliwa katika kiarabu na tafsiri zake zinatokana na kiarabu. Kwa hiyo utaona kiarabu ni Lugha muhimu kwa waislamu wote ili waweze kujua dini vizuri bila kuegemea tafsiri tu.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:08:15',
                'updated_at' => '2022-09-27 13:08:15',
                'file' => 'media/X8Ez54ySXUIsAvK0u25J2BQW973PykB5sHEaRxLk.pdf',
                'duration' => '6',
                'slug' => 'somo-la-kozi-ya-lugha-ya-kiarabu',
            ),
            1 => 
            array (
                'id' => '3',
                'workspace_id' => '1',
                'course_id' => '11',
                'title' => 'SOMO LA KOZI YA UANDISHI WA HABARI',
            'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Uandishi wa habari (kwa Kiingereza journalism) ni kazi ya kukusanya, kupanga na kusambaza habari kwa wasomaji, wasikilizaji na watazamaji katika jamii. </span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:10:58',
                'updated_at' => '2022-09-27 13:10:58',
                'file' => 'media/iY5qfwIuuNmmKlKur2T0o5LDmkPT3JtMI9doeqID.pdf',
                'duration' => '3',
                'slug' => 'somo-la-kozi-ya-uandishi-wa-habari',
            ),
            2 => 
            array (
                'id' => '4',
                'workspace_id' => '1',
                'course_id' => '10',
                'title' => 'SOMO LA KOZI YA UCHUMI NA UJASIRIAMALI',
            'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Moduli hii inahusu UCHUMI NA UJASIRIAMALI imekusudia kuwajengea uwezo Waisilam kwa ujumla wao (viongozi na waisiokuwa viongozi) maarifa muhimu yanahusu UCHUMI na UJASIRIAMALI ili waweze kuingia vyema katika kuujenga uchumi wa mtu mmoja mmoja na jamii kwa ujumla kwa kufanya shughuli za ujasiriamali au kwa wale ambao tayari wanafanya shughuli za ujasiriamali waweze kuongeza maarifa yao na kupiga hatua zaidi za kiuchumi.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:13:24',
                'updated_at' => '2022-09-27 13:13:24',
                'file' => 'media/eDzMHVcFYtVD8itSUrqbWpjK5FhigVjU1hFuzbGM.pdf',
                'duration' => NULL,
                'slug' => 'somo-la-kozi-ya-uchumi-na-ujasiriamali',
            ),
            3 => 
            array (
                'id' => '5',
                'workspace_id' => '1',
                'course_id' => '9',
                'title' => 'SOMO LA KOZI YA WALIMU WA MADRASA',
            'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Ufundishaji (ualimu) ni fani ambayo kila mjuzii wa kitu chochote lazima kuna chanzo na njia zilizo tumika kumfanya awe mjuzi. Na kila mjuzi ana mjuzi wake. Hivyo katika kozi hii kila aliye mjuzi ni wajibu kwake kuwajuza wengine wasio na ujuzi kupitia njia zilizo bainishwa na huo ndio ufundishaji. </span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:15:22',
                'updated_at' => '2022-09-27 13:15:22',
                'file' => 'media/oGJUnY2xH3kNygRodPHTbUbSlMoisGEXAjbokOe4.pdf',
                'duration' => '2',
                'slug' => 'somo-la-kozi-ya-walimu-wa-madrasa',
            ),
            4 => 
            array (
                'id' => '6',
                'workspace_id' => '1',
                'course_id' => '13',
                'title' => 'SOMO LA SCHOOL MANAGEMENT COURSE',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">School Management comprises planning, organizing, staffing, leading or directing, and controlling an educational institution with the purpose of accomplishing the educational goals. Its main aim is to create a safe and conducive learning environment in the school.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:17:00',
                'updated_at' => '2022-09-27 13:17:00',
                'file' => 'media/Ulu4bKEA2H5oOO16cFvEKGIZ0lzdGnWRxeo8RtsR.pdf',
                'duration' => '3',
                'slug' => 'somo-la-school-management-course',
            ),
            5 => 
            array (
                'id' => '7',
                'workspace_id' => '1',
                'course_id' => '8',
                'title' => 'SOMO LA STADI ZA MAISHA KWA MWANAMKE WA KIISLAM',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Kutokana na dunia ya sasa mambo mengi kuhitaji maarifa, inatubidi tujifunze kila mara ili tuweze kuendelea kumcha Mwenyezi Mungu wa pekee, aliyetakasika na wakati huo huo tukimudu maisha yenye mabadiliko.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:19:01',
                'updated_at' => '2022-09-27 13:21:08',
                'file' => 'media/vdif3PckZCW5SwrBVzWOsOvc5RiufvfhYmJ3r7TW.pdf',
                'duration' => '1',
                'slug' => 'somo-la-stadi-za-maisha-kwa-mwanamke',
            ),
            6 => 
            array (
                'id' => '8',
                'workspace_id' => '1',
                'course_id' => '7',
                'title' => 'SOMO LA STADI ZA UHASIBU NA USIMAMIZI WA FEDHA',
            'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Moduli hii imeaandaliwa kwa lengo kuu la kujenga weledi (ufahamu) katika stadi za uhasibu na usimamizi wa fedha kwa watendaji na viongozi wa taasisi. Kwa kuwa taaluma ni pana sana ya maswala ya uhasibu na usimamizi wa fedha, mdouli hii imelenga katika kutoa mwangaza wa kumfanya kiongozi na mtendaji katika taasisi kutekeleza wajibu wao kwa mambo muhimu lakini bila kupoteza rasilimali za taasisi.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:23:17',
                'updated_at' => '2022-09-27 13:23:17',
                'file' => 'media/pUChI7vcoSnmjyMtIOiGnaPgAKqAbGxZI5GgTh0w.pdf',
                'duration' => '3',
                'slug' => 'somo-la-stadi-za-uhasibu-na-usimamizi-wa-fedha',
            ),
            7 => 
            array (
                'id' => '9',
                'workspace_id' => '1',
                'course_id' => '6',
                'title' => 'SOMO LA UFUGAJI WA KUKU',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Kitabu hiki kitaelekeza kwa muhtasari mbinu muhimu za ufugaji wa kuku kwa faida ikizingatiwa kufuga kwa kanuni za kisasa na maradhi ya kuku bila kusahau tiba za maradhi hayo ili mfugaji haweze kupata faida inayoendana na juhudi zake bila kusahau mtaji aliyotumia katika mradi wa kuku.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:25:03',
                'updated_at' => '2022-09-27 13:25:03',
                'file' => 'media/QQxQ5wXV1Ya8gdjCXI9x8KybVKuiL4ss7Mao4iY4.pdf',
                'duration' => '3',
                'slug' => 'somo-la-ufugaji-wa-kuku',
            ),
            8 => 
            array (
                'id' => '10',
                'workspace_id' => '1',
                'course_id' => '5',
                'title' => 'SOMO LA UONGOZI NA USIMAMIZI WA MSIKITI',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Kozi hii ni maalum kwa Viongozi wa Msikiti kama imam, Katibu, Mweka hazina na Wajumbe wote na pia ni hiari kwa yoyote anayehitaji maarifa na kujiandaa kuongoza msikiti siku zijazo katika maisha yake.</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:27:00',
                'updated_at' => '2022-09-27 13:27:00',
                'file' => 'media/33Z5QHVeumMtRUNAwSs27KKIBxrtoQc3kw4ILx9d.pdf',
                'duration' => '1',
                'slug' => 'somo-la-uongozi-na-usimamizi-wa-msikiti',
            ),
            9 => 
            array (
                'id' => '11',
                'workspace_id' => '1',
                'course_id' => '4',
                'title' => 'SOMO LA UONGOZI NDANI YA BAKWATA',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Moduli hii ni maalumu kwa viongozi ambao wapo katika nafasi mbali mbali za BAKWATA kwa sasa na wale ambao si viongozi lakini wangependa kusoma kwa matumizi yao ya baadaye. </span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:29:23',
                'updated_at' => '2022-09-27 13:29:23',
                'file' => 'media/v2PfMiVJe0QfeVb1gwAjzbi5x349YKdBTFPtIUTJ.pdf',
                'duration' => '3',
                'slug' => 'somo-la-uongozi-ndani-ya-bakwata',
            ),
            10 => 
            array (
                'id' => '12',
                'workspace_id' => '1',
                'course_id' => '3',
                'title' => 'SOMO LA URAIA, MAADILI NA SHERIA ZA MSINGI NA SHERIA ZA ARDHI',
                'description' => '<p><span style="color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;">Hili somo rasmi la Uraia na Maadili ni somo kwa kila mtanzania wa umri wowote na linahusu hasa kanuni zinazobainisha uzuri na ubaya wa matendo ya binadamu. Tutajifunza ni jinsi gani binadamu anastahili au anapaswa kuishi. Kwa maneno mengine, katika Somo la Uraia na Maadili tunajiuliza maisha mazuri ni yapi? Kuishi vizuri maana yake ni nini? Ubaya ni nini? Tunawezaje kuishi kama binadamu?</span></p>',
                'image' => NULL,
                'video' => NULL,
                'order' => '0',
                'created_at' => '2022-09-27 13:31:56',
                'updated_at' => '2022-09-27 13:31:56',
                'file' => 'media/fsuCYzwJ3koBHjlFI5uJVEzhKWVCtEYcVDRiPR5O.pdf',
                'duration' => '3',
                'slug' => 'somo-la-uraia,-maadili-na-sheria-za-msingi-na-sheria-za-ardhi',
            ),
        ));
        
        
    }
}
