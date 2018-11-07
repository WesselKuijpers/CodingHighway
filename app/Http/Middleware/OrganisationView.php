<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OrganisationView
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
        if($request->id == Auth::user()->organisation()->id && Auth::user()->hasRole('admin')):
            return $next($request);
        endif;

        return redirect()->route('home')->with('errors', 'Je hebt geen recht om deze organisatie te bekijken.');
    }
}
