<?php

namespace JasonMcCallister\DockerPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class DockerPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('docker', function ($command) {
            $options = [];

            $database = $command->choice('What database are you using?', ['MySQL', 'PostgreSQL'], 1);
            $options['database'] = $database;

            DockerPreset::install($options);

            $command->info('Docker scaffolding installed successfully.');
            $command->info('You can now run `make up` to get started running your Laravel app locally with Docker!');
        });
    }
}
