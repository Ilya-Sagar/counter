<?php

namespace Database\Seeders;

use App\Models\AttendType;
use Illuminate\Database\Seeder;

class AttendTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttendType::create(['name' => 'нет', 'is_miss' => 1]);
        AttendType::create(['name' => 'бол', 'is_miss' => 1]);
        AttendType::create(['name' => 'отс', 'is_miss' => 1]);
        AttendType::create(['name' => 'сем', 'is_miss' => 1]);
        AttendType::create(['name' => 'проч', 'is_miss' => 1]);
        AttendType::create(['name' => 'есть', 'is_miss' => 0]);
    }
}
