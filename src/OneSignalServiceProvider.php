<?php

namespace Hatasever\OneSignal;

use Illuminate\Support\ServiceProvider;
use Hatasever\OneSignal\OneSignalClient;

class OneSignalServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/one-signal.php';

        $this->publishes([$configPath => config_path('one-signal.php')], 'config');
        $this->mergeConfigFrom($configPath, 'one-signal');

        // if ($this->app instanceof Laravel\Lumen\Application) {
        //     $this->app->configure('one-signal');
        // }

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $this->app->singleton('one-signal', function ($app) {


            $config = isset($app['config']['one-signal']) ? $app['config']['one-signal'] : null;
            if (is_null($config)) {
                $config = $app['config']['one-signal'] ?: $app['config']['one-signal::config'];
            }

            return new OneSignalClient($config['app_id'], $config['rest_api_key'], $config['user_auth_key'] , $config['guzzle_client_timeout']);
        });

        // $this->app->bind('onesignal', function($app) {
        //     $config = isset($app['config']['onesignal']) ? $app['config']['onesignal'] : null;
        //     if (is_null($config)) {
        //         $config = $app['config']['onesignal'] ?: $app['config']['onesignal::config'];
        //     }
        //     return new OneSignalClient($config['app_id'], $config['rest_api_key'], $config['user_auth_key'] , $config['guzzle_client_timeout']);
        // });
        // $this->app->alias('onesignal', \Hatasever\OneSignal\OneSignalClient::class);
    }

    // public function provides() {
    //     return ['onesignal'];
    // }
}
