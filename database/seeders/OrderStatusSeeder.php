<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            ['title' => 'new'],
            ['title' => 'in_processing'],
            ['title' => 'on_holding'],
            ['title' => 'canceled'],
            ['title' => 'returned'],
            ['title' => 'completed'],
            ['title' => 'awaiting_payment'],
        ]);
    }
}
