<?php

use Illuminate\Database\Seeder;

class CitysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $publicpath=database_path();
        $sql=file_get_contents($publicpath.'/tables/city.sql');
        \Illuminate\Support\Facades\DB::insert($sql);
    }
}
