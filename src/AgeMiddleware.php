<?php

namespace EighteenPlus\Agegatelaravel;

use Closure;
use EighteenPlus\AgeGate\AgeGate;

class AgeMiddleware
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
        $ageGate = new AgeGate(url('/ageGateCheck'));
        $ageGate->setTitle(env('AGEGATE_TITLE'));
        $ageGate->run();
        
        return $next($request);
    }
}
