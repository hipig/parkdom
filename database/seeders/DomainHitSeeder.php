<?php

namespace Database\Seeders;

use App\Models\DomainHit;
use Illuminate\Database\Seeder;

class DomainHitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DomainHit::factory()->times(500)->create();
    }
}
