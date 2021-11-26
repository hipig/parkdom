<?php

namespace Database\Seeders;

use App\Models\DomainVisit;
use Illuminate\Database\Seeder;

class DomainVisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DomainVisit::factory()->times(10000)->create();
    }
}
