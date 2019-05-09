# Presets for shipping Laravel on Docker

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jasonmccallister/laravel-docker-preset.svg?style=flat-square)](https://packagist.org/packages/jasonmccallister/laravel-docker-preset)
[![Total Downloads](https://img.shields.io/packagist/dt/jasonmccallister/laravel-docker-preset.svg?style=flat-square)](https://packagist.org/packages/jasonmccallister/laravel-docker-preset)

![Laravel Docker Preset](./docker-preset.gif)

Quickly scaffold new projects for shipping Laravel apps with Docker easily! The preset will give you a `Dockerfile`, `docker-compose.yaml`, `.dockerignore`, and `Makefile` with helpful commands to start developing and shipping your application in Docker.

These are tips that I have learned shipping multiple Laravel applications (Amazon ECS, Google Cloud, and Docker Cloud (R.I.P)) over the years in one place.

## Installation

You can install the package via composer:

```bash
composer require jasonmccallister/laravel-docker-preset
```

## Usage

```php
php artisan preset docker
```

Now you can run `make up` and Docker will start to build your app, database, queue worker, and redis.

### Security

If you discover any security related issues, please email themccallister@gmail.com instead of using the issue tracker.

## Credits

- [Jason McCallister](https://github.com/jasonmccallister)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
