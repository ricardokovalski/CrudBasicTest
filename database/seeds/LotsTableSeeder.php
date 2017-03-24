<?php

use Illuminate\Database\Seeder;
use App\Entities\Lot;

class LotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lot::class, 5)->create();
    }
}
