<?php

namespace Database\Seeders;

use App\Models\ReportCard;
use App\Models\Visitor;
use Illuminate\Database\Seeder;

class ReportCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportCard::create([
            'owner_id' => 1,
            'month' => 'october',
            'year' => '2021',
        ]);


        Visitor::create([
            'name' => 'John Samy',
            'account_number' => 304985,
            'payment' => 235.1
        ]);
        Visitor::create([
            'name' => 'Miky Rock',
            'account_number' => 412985,
            'payment' => 145.1
        ]);
        Visitor::create([
            'name' => 'Lise Ronor',
            'account_number' => 723455,
            'payment' => 495.1
        ]);


    }
}
