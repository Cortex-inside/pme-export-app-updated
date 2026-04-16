<?php

namespace PMEexport\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfEmpresa
{
    /**
     * Handle an incoming request.
     * Redirects company users to complement registration if their profile is incomplete.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ?string $guard = null): Response
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            if ($user->hasAnyRole(['empresa', 'empresa_estrangeira'])
                && ! $request->is('sysCompany/complementRegister')
            ) {
                if (! $user->company) {
                    Auth::logout();

                    return redirect()->route('login');
                }

                if (in_array($user->company->status, [4, 5])) {
                    return redirect()->route('sysCompany.complementRegister');
                }
            }
        }

        return $next($request);
    }
}
