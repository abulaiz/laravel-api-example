<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Data;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_master = [
        	[
        		'name' => "Imron Abu Laiz", 
        		'email' => "imronabulaiz@gmail.com",
        		'password' => bcrypt('imronabulaiz'),
        		'service_number' => '0001',
        		'phone' => '08921312412',
        		'gadget_type' => 'Smartphone',
        		'damage' => '100'
        	],
        	[
        		'name' => "Abu Imron Laiz", 
        		'email' => "abuimronlaiz@gmail.com",
        		'password' => bcrypt('abuimronlaiz'),
        		'service_number' => '0002',
        		'phone' => '08921313242',
        		'gadget_type' => 'Tablet',
        		'damage' => '100'
        	],
        	[
        		'name' => "Abu Laiz Imron", 
        		'email' => "abulaizimron@gmail.com",
        		'password' => bcrypt('abulaizimron'),
        		'service_number' => '0003',
        		'phone' => '08921312412',
        		'gadget_type' => 'Smartphone',
        		'damage' => '100'
        	]        	        	
        ];

        foreach ($data_master as $item) {
        	$d = array_chunk($item, 3, true);
        	// $this->command->info(json_encode($d[0]));
        	// $this->command->info(json_encode( array_merge($d[1], $d[2]) ));
        	$user = User::create( $d[0] );
        	$user->data()->create( array_merge($d[1], $d[2]) );
        }
    }
}
