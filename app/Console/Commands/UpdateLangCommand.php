<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UpdateLangCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lang:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lang update';

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
        File::copy(storage_path('lang/en.init.json'), resource_path('lang/en.json'));
        File::copy(storage_path('lang/zh_CN.init.json'), resource_path('lang/zh_CN.json'));
    }
}
