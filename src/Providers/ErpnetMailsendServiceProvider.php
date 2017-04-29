<?php

namespace ErpNET\Mailsend\Providers;

use Illuminate\Support\ServiceProvider;

class ErpnetMailsendServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $app = $this->app;

        $projectRootDir = __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR;
        $routesDir = $projectRootDir."routes".DIRECTORY_SEPARATOR;
        $viewsDir = $projectRootDir."resources/views".DIRECTORY_SEPARATOR;

        $configPath = $projectRootDir . 'config/erpnetMailsend.php';
        $this->mergeConfigFrom($configPath, 'erpnetMailsend');

        $app['config']->set('database.connections', array_merge(config('erpnetMailsend.connections'), config('database.connections')));

        logger(config('database.connections'));

        //Publish Config
        $this->publishes([
            $projectRootDir.'config/erpnetMailsend.php' => config_path('erpnetMailsend.php')
        ], 'config');

        //Bind Interfaces
//        $app->bind($bindInterface, $bindRepository);
//        foreach (config('erpnetMigrates.tables') as $table => $config) {
//            $routePrefix = isset($config['routePrefix'])?$config['routePrefix']:str_singular($table);
//            $bindInterface = '\\ErpNET\\Models\\v1\\Interfaces\\'.(isset($config['bindInterface'])?$config['bindInterface']:(ucfirst($routePrefix).'Repository'));
//            $bindRepository = '\\ErpNET\\Models\\v1\\Repositories\\'.(isset($config['bindRepository'])?$config['bindRepository']:(ucfirst($routePrefix).'RepositoryEloquent'));
//
//            if(interface_exists($bindInterface)  && class_exists($bindRepository)){
//                $app->bind($bindInterface, $bindRepository);
//            }
//        }


        $this->loadViewsFrom($viewsDir, 'mailsend');

        $this->publishes([
            $viewsDir => base_path('resources/views/vendor/mailsend'),
        ], 'views');

        //Routing
//        include $routesDir."api.php";
        include $routesDir."web.php";

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->register(\Dingo\Api\Provider\LaravelServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
