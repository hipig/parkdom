<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'code' => 'en',
            'name' => 'English',
            'default' => true,
        ]);
        File::copy(storage_path('lang/en.init.json'), resource_path('lang/en.json'));

        Language::create([
            'code' => 'zh_CN',
            'name' => 'Chinese',
        ]);
        File::copy(storage_path('lang/zh_CN.init.json'), resource_path('lang/zh_CN.json'));
    }
}
