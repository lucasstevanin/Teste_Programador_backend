<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        // Registrar as rotas do `api.php`
        $this->mapApiRoutes();

        // Registrar as rotas do `web.php`
        $this->mapWebRoutes();
    }

    /**
     * Define as rotas da API.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') // Define o prefixo padrão "api/"
            ->middleware('api') 
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }


}
