<?php

namespace JasonMcCallister\DockerPreset;

use Illuminate\Filesystem\Filesystem;

class DockerPreset
{
    public static function install()
    {
        tap(new Filesystem, function ($filesystem) {
            if (!$filesystem->isDirectory($directory = base_path('.docker'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__ . '/stubs/000-default.conf', base_path('.docker/000-default.conf'));
        copy(__DIR__ . '/stubs/Makefile', base_path('Makefile'));
        copy(__DIR__ . '/stubs/Dockerfile', base_path('Dockerfile'));
        copy(__DIR__ . '/stubs/docker-compose.yaml', base_path('docker-compose.yaml'));
        copy(__DIR__ . '/stubs/.dockerignore', base_path('.dockerignore'));
    }
}
