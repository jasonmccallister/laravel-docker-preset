<?php

namespace JasonMcCallister\DockerPreset;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Log;

class DockerPreset
{
    public static function install(array $options)
    {
        tap(new Filesystem, function ($filesystem) {
            if (!$filesystem->isDirectory($directory = base_path('.docker'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        switch ($options['database']) {
            case 'PostgreSQL':
                copy(__DIR__ . '/stubs/postgres.docker-compose.yaml', base_path('docker-compose.yaml'));
                copy(__DIR__ . '/stubs/postgres.Dockerfile', base_path('Dockerfile'));
                break;
            default:
                copy(__DIR__ . '/stubs/mysql.docker-compose.yaml', base_path('docker-compose.yaml'));
                copy(__DIR__ . '/stubs/mysql.Dockerfile', base_path('Dockerfile'));
                break;
        }

        copy(__DIR__ . '/stubs/000-default.conf', base_path('.docker/000-default.conf'));
        copy(__DIR__ . '/stubs/Makefile', base_path('Makefile'));
        copy(__DIR__ . '/stubs/.dockerignore', base_path('.dockerignore'));
    }
}
