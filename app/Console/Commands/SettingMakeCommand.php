<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class SettingMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:setting {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new setting class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Setting';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/setting.plain.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace ($rootnamespace)
    {
        return $rootnamespace . '\Settings';
    }
}
