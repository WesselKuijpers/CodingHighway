<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LicenseCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->license->count() === 1 && $request->user()->license->first()->expired == false)
        {
            return $next($request);
        }

        return redirect('/home')->with('msg', 'je moet een actieve licentie hebben voor deze actie.');
    }
}
