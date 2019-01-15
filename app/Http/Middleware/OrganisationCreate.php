<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OrganisationCreate
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
        if (Auth::user()->organisation() == null):
            return $next($request);
        endif;

        return redirect()->route('home')->with('error', 'Je bent al een lid van een organisatie, dus kan je er geen aanvragen');
    }
}
