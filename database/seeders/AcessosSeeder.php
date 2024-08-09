<?php

namespace Database\Seeders;

use App\Models\Acessos;
use App\Models\Feedbacks;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcessosSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Acessos::factory()->count(1)->create();
    }
}
