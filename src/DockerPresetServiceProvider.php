<?php

namespace JasonMcCallister\DockerPreset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

class DockerPresetServiceProvider extends ServiceProvider
{
    public function boot()
    {
        PresetCommand::macro('docker', function ($command) {
            // TODO ask what type of database
            DockerPreset::install();

            $command->info('Docker scaffolding installed successfully.');
            $command->info('You can now run `make up` to get started running your Laravel app locally with Docker!');
        });
    }
}
