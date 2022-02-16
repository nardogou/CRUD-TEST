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
<<<<<<< HEAD
        company::factory(100)->create();
=======
        company::factory(10)->create();
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
    }
}
