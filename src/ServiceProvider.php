<?php
namespace Digbang;

use Illuminate\Contracts\Validation\Factory;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // 
    }

    public function boot(Factory $validation)
    {
        $this->publishes([
            dirname(__DIR__) . '/config/recruitment.php' => config_path('/recruitment.php'),
        ], 'config');

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'digbang');

        $validation->extend('cv', function($value){
            $fol = new FileOrLink($value);

            return $fol->isFile() || $fol->isLink();
        });

        $this->commands([
            WorkWithUs::class,
        ]);
    }
}
