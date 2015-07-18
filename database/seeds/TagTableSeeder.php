<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('tags')->truncate();

        DB::table('tags')->insert([
            ['name' => 'design pattern'],
            ['name' => 'cache'],
            ['name' => 'phpunit'],
            ['name' => 'security'],
            ['name' => 'Facade'],
            ['name' => 'Behat'],
            ['name' => 'Fabric'],
            ['name' => 'Bash']
        ]);
    }
}
