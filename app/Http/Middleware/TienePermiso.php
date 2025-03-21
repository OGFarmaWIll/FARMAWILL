<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;


class TienePermiso
{
    
    public function handle(Request $request, Closure $next, $permiso = null): Response
    {
        if (!$permiso) {
            return $next($request); 
        }

        $usuario = Usuario::find(Auth::user()->c_idusuario);

        if (!$usuario->tienePermiso($permiso)) {
            abort(403, 'No tienes permisos para acceder.');
        }

        return $next($request);
    }
}
