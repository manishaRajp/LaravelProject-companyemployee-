<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\userCmp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        userCmp::factory(200)->create();
        // $this->call(ComapnySeeder::class);
    }
}
