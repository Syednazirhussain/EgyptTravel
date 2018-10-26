<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('status')->delete();
        
        \DB::table('status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Active',
                'status_code' => 'active',
                'created_at' => '2018-10-02 05:28:39',
                'updated_at' => '2018-10-02 05:28:39',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Inactive',
                'status_code' => 'inactive',
                'created_at' => '2018-10-02 05:28:39',
                'updated_at' => '2018-10-02 05:28:39',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}