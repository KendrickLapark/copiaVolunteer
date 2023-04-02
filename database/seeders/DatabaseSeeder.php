<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            /* ActivitySeeder::class, */
            AdminUserSeeder::class,
            EntitySeeder::class,
            DelegationSeeder::class,
            TypeActivitySeeder::class,
        ]);
    }
}
