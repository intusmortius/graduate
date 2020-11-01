<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        if (!auth()->user()->hasRoles($role)) {
            abort(404);
        }

        if ($permission !== null && !auth()->user()->hasPermissions($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
