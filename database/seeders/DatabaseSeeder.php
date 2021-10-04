<?php

namespace Database\Seeders;

use App\Models\AttendType;
use App\Models\ReportCard;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            AttendType::class,
            ReportCard::class,
            UserSeeder::class,
        ]);
    }
}
