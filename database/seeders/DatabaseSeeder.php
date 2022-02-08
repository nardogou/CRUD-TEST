<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
   public function run()
    {
    //    $this->call(UsersTableSeeder::class);
    User::factory(10)->create();
    $this->call([companies::class]);
    $this->call([employees::class]);
    
    }


}