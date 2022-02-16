<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\employees as Employee;

class employees extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        Employee::factory(100)->create();
=======
        Employee::factory(10)->create();
>>>>>>> f9fbe03a5918e558779e2d7943fbf46d4f44b510
    }
}
