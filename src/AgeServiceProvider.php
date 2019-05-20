<?php

namespace EighteenPlus\Agegatelaravel;

use Illuminate\Support\ServiceProvider;

class AgeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', \EighteenPlus\Agegatelaravel\AgeMiddleware::class);
        
        \Route::any('/ageGateCheck', function(){
            $a = new \EighteenPlus\AgeGate\AgeGate();
            echo $a->callbackVerify();
            exit;
        });
    }
}
