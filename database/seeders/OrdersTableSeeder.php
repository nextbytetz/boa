<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => '1',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-16 07:59:44',
                'updated_at' => '2022-09-16 07:59:44',
            ),
            1 => 
            array (
                'id' => '2',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-16 08:02:03',
                'updated_at' => '2022-09-16 08:02:03',
            ),
            2 => 
            array (
                'id' => '3',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '100000.00',
                'created_at' => '2022-09-16 08:13:58',
                'updated_at' => '2022-09-16 08:13:58',
            ),
            3 => 
            array (
                'id' => '4',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '100000.00',
                'created_at' => '2022-09-16 08:14:50',
                'updated_at' => '2022-09-16 08:14:50',
            ),
            4 => 
            array (
                'id' => '5',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '100000.00',
                'created_at' => '2022-09-16 10:16:02',
                'updated_at' => '2022-09-16 10:16:02',
            ),
            5 => 
            array (
                'id' => '6',
                'product_id' => '0',
                'student_id' => '12',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-16 10:49:13',
                'updated_at' => '2022-09-16 10:49:13',
            ),
            6 => 
            array (
                'id' => '7',
                'product_id' => '0',
                'student_id' => '12',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-16 11:01:12',
                'updated_at' => '2022-09-16 11:01:12',
            ),
            7 => 
            array (
                'id' => '8',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 02:28:15',
                'updated_at' => '2022-09-18 02:28:15',
            ),
            8 => 
            array (
                'id' => '9',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 02:28:19',
                'updated_at' => '2022-09-18 02:28:19',
            ),
            9 => 
            array (
                'id' => '10',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 02:54:18',
                'updated_at' => '2022-09-18 02:54:18',
            ),
            10 => 
            array (
                'id' => '11',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 02:57:18',
                'updated_at' => '2022-09-18 02:57:18',
            ),
            11 => 
            array (
                'id' => '12',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 02:57:25',
                'updated_at' => '2022-09-18 02:57:25',
            ),
            12 => 
            array (
                'id' => '13',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:00:28',
                'updated_at' => '2022-09-18 03:00:28',
            ),
            13 => 
            array (
                'id' => '14',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:01:33',
                'updated_at' => '2022-09-18 03:01:33',
            ),
            14 => 
            array (
                'id' => '15',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:02:01',
                'updated_at' => '2022-09-18 03:02:01',
            ),
            15 => 
            array (
                'id' => '16',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:03:52',
                'updated_at' => '2022-09-18 03:03:52',
            ),
            16 => 
            array (
                'id' => '17',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:04:36',
                'updated_at' => '2022-09-18 03:04:36',
            ),
            17 => 
            array (
                'id' => '18',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:15:31',
                'updated_at' => '2022-09-18 03:15:31',
            ),
            18 => 
            array (
                'id' => '19',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:28:27',
                'updated_at' => '2022-09-18 03:28:27',
            ),
            19 => 
            array (
                'id' => '20',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:28:48',
                'updated_at' => '2022-09-18 03:28:48',
            ),
            20 => 
            array (
                'id' => '21',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:29:43',
                'updated_at' => '2022-09-18 03:29:43',
            ),
            21 => 
            array (
                'id' => '22',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:29:52',
                'updated_at' => '2022-09-18 03:29:52',
            ),
            22 => 
            array (
                'id' => '23',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:30:09',
                'updated_at' => '2022-09-18 03:30:09',
            ),
            23 => 
            array (
                'id' => '24',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:32:15',
                'updated_at' => '2022-09-18 03:32:15',
            ),
            24 => 
            array (
                'id' => '25',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:33:26',
                'updated_at' => '2022-09-18 03:33:26',
            ),
            25 => 
            array (
                'id' => '26',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:36:09',
                'updated_at' => '2022-09-18 03:36:09',
            ),
            26 => 
            array (
                'id' => '27',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:38:44',
                'updated_at' => '2022-09-18 03:38:44',
            ),
            27 => 
            array (
                'id' => '28',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:39:43',
                'updated_at' => '2022-09-18 03:39:43',
            ),
            28 => 
            array (
                'id' => '29',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:40:59',
                'updated_at' => '2022-09-18 03:40:59',
            ),
            29 => 
            array (
                'id' => '30',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:41:07',
                'updated_at' => '2022-09-18 03:41:07',
            ),
            30 => 
            array (
                'id' => '31',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:41:21',
                'updated_at' => '2022-09-18 03:41:21',
            ),
            31 => 
            array (
                'id' => '32',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:41:49',
                'updated_at' => '2022-09-18 03:41:49',
            ),
            32 => 
            array (
                'id' => '33',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:42:39',
                'updated_at' => '2022-09-18 03:42:39',
            ),
            33 => 
            array (
                'id' => '34',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:43:08',
                'updated_at' => '2022-09-18 03:43:08',
            ),
            34 => 
            array (
                'id' => '35',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:43:19',
                'updated_at' => '2022-09-18 03:43:19',
            ),
            35 => 
            array (
                'id' => '36',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:44:20',
                'updated_at' => '2022-09-18 03:44:20',
            ),
            36 => 
            array (
                'id' => '37',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:44:36',
                'updated_at' => '2022-09-18 03:44:36',
            ),
            37 => 
            array (
                'id' => '38',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:44:55',
                'updated_at' => '2022-09-18 03:44:55',
            ),
            38 => 
            array (
                'id' => '39',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:45:31',
                'updated_at' => '2022-09-18 03:45:31',
            ),
            39 => 
            array (
                'id' => '40',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:48:25',
                'updated_at' => '2022-09-18 03:48:25',
            ),
            40 => 
            array (
                'id' => '41',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:49:53',
                'updated_at' => '2022-09-18 03:49:53',
            ),
            41 => 
            array (
                'id' => '42',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:50:06',
                'updated_at' => '2022-09-18 03:50:06',
            ),
            42 => 
            array (
                'id' => '43',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:51:34',
                'updated_at' => '2022-09-18 03:51:34',
            ),
            43 => 
            array (
                'id' => '44',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:56:26',
                'updated_at' => '2022-09-18 03:56:26',
            ),
            44 => 
            array (
                'id' => '45',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 03:57:49',
                'updated_at' => '2022-09-18 03:57:49',
            ),
            45 => 
            array (
                'id' => '46',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-18 04:10:32',
                'updated_at' => '2022-09-18 04:10:32',
            ),
            46 => 
            array (
                'id' => '47',
                'product_id' => '0',
                'student_id' => '15',
                'quantity' => '0',
                'order_total' => '110000.00',
                'created_at' => '2022-09-18 06:46:17',
                'updated_at' => '2022-09-18 06:46:17',
            ),
            47 => 
            array (
                'id' => '48',
                'product_id' => '0',
                'student_id' => '17',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-18 10:55:34',
                'updated_at' => '2022-09-18 10:55:34',
            ),
            48 => 
            array (
                'id' => '49',
                'product_id' => '0',
                'student_id' => '16',
                'quantity' => '0',
                'order_total' => '10000.00',
                'created_at' => '2022-09-21 03:58:53',
                'updated_at' => '2022-09-21 03:58:53',
            ),
            49 => 
            array (
                'id' => '50',
                'product_id' => '0',
                'student_id' => '1',
                'quantity' => '0',
                'order_total' => '100000.00',
                'created_at' => '2022-09-26 09:41:19',
                'updated_at' => '2022-09-26 09:41:19',
            ),
        ));
        
        
    }
}