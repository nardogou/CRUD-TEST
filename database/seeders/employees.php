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
        Employee::factory(100)->create();
    }
}
