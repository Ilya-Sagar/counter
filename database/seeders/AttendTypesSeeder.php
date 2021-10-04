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
        AttendType::create(['name' => 'нет',]);
        AttendType::create(['name' => 'бол']);
        AttendType::create(['name' => 'отс']);
        AttendType::create(['name' => 'сем']);
        AttendType::create(['name' => 'проч']);
        AttendType::create(['name' => 'есть']);
    }
}
