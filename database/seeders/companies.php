<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\companies as company;

class companies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        company::factory(100)->create();

    }
}
