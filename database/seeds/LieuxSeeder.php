<?php

use Illuminate\Database\Seeder;

class LieuxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lieus')->insert(array(
            array('lieu'=>'Sainte-Marie'),
            array('lieu'=>'Saint-Paul'),
            array('lieu'=>'Saint-Pierre'),
        ));
    }
}
