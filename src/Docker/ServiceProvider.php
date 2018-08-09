<?php

declare(strict_types=1);

namespace Docker;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * 是否延时加载提供器。
     *
     * @var bool
     */
    protected $defer = true;

    public function boot(): void
    {
        $configPath = __DIR__.'/../../config/docker.php';

        $this->mergeConfigFrom($configPath, 'docker');

        $this->app->singleton(Docker::class, function () {
            return Docker::docker(Docker::createOptionArray(
                config('docker.host'),
                config('docker.tls_verify'),
                config('docker.cert_path'),
                config('docker.username'),
                config('docker.password'),
                config('docker.registry'),
                config('docker.timeout')
            ));
        });
    }

    public function register(): void
    {
        $configPath = __DIR__.'/../../config/docker.php';

        $this->publishes([$configPath => config_path('docker.php')], 'config');
    }

    /**
     * 获取提供器提供的服务。
     *
     * @return array
     */
    public function provides()
    {
        return [Docker::class];
    }
}
