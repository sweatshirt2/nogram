<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClearQueueSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->truncate();
    }
}
