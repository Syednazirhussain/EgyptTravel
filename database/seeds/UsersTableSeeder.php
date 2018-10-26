<?php

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
                'id' => 15,
                'name' => 'administrator',
                'email' => 'admin@example.com',
                'mobile' => '03422361422',
                'pic' => 'uV3xAn7kSX2qGku7r9f9e9XBD7VERdC2IFa8iSvJ.jpeg',
                'user_role_code' => 'admin',
                'status_code' => 'active',
                'password' => '$2y$10$tGKR.6m3EtgZu61MYhcQ3uWlu4gX8PeQsGorL3NqU0cU7sEEsLMpi',
                'remember_token' => 'iqv8W3ohHPb6CTx3axLHm3JDR9GSDg8OXdXtX90ixeJP0idnQp09t9rqFNEm',
                'created_at' => NULL,
                'updated_at' => '2018-10-05 05:09:44',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 16,
                'name' => 'Medora',
                'email' => 'medora@gmail.com',
                'mobile' => '03062106898',
                'pic' => 'G8cdpQFS3xibseN6sKoTFtbZVKEdVbZjvMu1QTii.jpeg',
                'user_role_code' => 'user',
                'status_code' => 'active',
                'password' => '$2y$10$42pHLbY9Z8dhAz4F7Zy.OeBOP0TZ7IqOcLXvqAdeWs1UCOgJg51c2',
                'remember_token' => NULL,
                'created_at' => '2018-10-04 12:07:41',
                'updated_at' => '2018-10-05 13:15:04',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 17,
                'name' => 'Ali raza',
                'email' => 'aliraza@gmail.com',
                'mobile' => '03155632415',
                'pic' => 'tKx1oLYTSu1y4cPjTDss06Kjxwyi1POQNq0LzpiO.jpeg',
                'user_role_code' => 'user',
                'status_code' => 'inactive',
                'password' => '$2y$10$1RQMri5KAIzd.syVGbkLOecgpUnJMfDxW4B9YXRAyg1ew2bStB5fe',
                'remember_token' => NULL,
                'created_at' => '2018-10-05 10:44:18',
                'updated_at' => '2018-10-05 10:44:48',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 18,
                'name' => 'Aurangzab',
                'email' => 'aurangzab@gmail.com',
                'mobile' => '03066542145',
                'pic' => 'zJeBx22IApGL3yQTtSjQiODjcTsJTSPGdcnNR290.jpeg',
                'user_role_code' => 'user',
                'status_code' => 'active',
                'password' => '$2y$10$eyMFfxYobK5JfmOU0nUQouU/G4kgaXPOdaS.7HB.UgLiV56.o8WNi',
                'remember_token' => NULL,
                'created_at' => '2018-10-05 10:45:33',
                'updated_at' => '2018-10-08 05:50:54',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}