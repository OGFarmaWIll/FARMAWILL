<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('tienePermiso', function ($permiso) {
           $usuario = Usuario::find(Auth::user()->c_idusuario);

           return $usuario->tienePermiso($permiso);

            
        });
    }
}
