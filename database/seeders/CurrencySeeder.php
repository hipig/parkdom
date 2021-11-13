<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'code' => 'USD',
                'prefix' => '$'
            ],
            [
                'code' => 'CAD',
                'prefix' => 'C$'
            ],
            [
                'code' => 'EUR',
                'prefix' => '€'
            ],
            [
                'code' => 'CNY',
                'prefix' => '￥'
            ],
            [
                'code' => 'GBP',
                'prefix' => '￡'
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
