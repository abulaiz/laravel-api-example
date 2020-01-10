<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		$this->command->info('Registering passport ...');
		$this->command->call('passport:install');   	
        $this->call(DataSeeder::class);
    }
}
