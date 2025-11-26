<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userId = Auth::id();

        $isAdmin = DB::table('users_has_roles')
            ->join('roles', 'roles.id', '=', 'users_has_roles.roles_id')
            ->where('users_has_roles.users_id', $userId)
            ->whereRaw('LOWER(roles.nome) = ?', ['admin'])
            ->exists();

        if (! $isAdmin) {
            abort(403);
        }

        return $next($request);
    }
}
