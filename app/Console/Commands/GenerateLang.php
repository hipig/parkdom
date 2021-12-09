<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateLang extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lang generate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $paths = [
            resource_path('views'),
            app_path('Http'),
            app_path('Models'),
        ];

        $allResult = collect();
        foreach ($paths as $path) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                $fileContent = File::get($file->getRealPath());
                $result = Str::of($fileContent)->matchAll('/__\(\'(.+?)\'/');
                $allResult->push($result);
            }
        }

        $content = $allResult->flatten()->unique()->sort()->mapWithKeys(function ($value) {
            return [$value => $value];
        });

        File::put(resource_path('lang/en.json.temp'), $content->toJson());
    }
}
