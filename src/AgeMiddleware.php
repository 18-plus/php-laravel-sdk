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
        $gate = new AgeGate(url('/ageGateCheck'));
        $gate->setTitle(env('agegate_title'));
        $gate->setLogo(env('agegate_logo'));
        
        $gate->setSiteName(env('agegate_site_name'));
        $gate->setCustomText(env('agegate_custom_text'));
        $gate->setCustomLocation(env('agegate_custom_text_location'));
        
        $gate->setBackgroundColor(env('agegate_background_color'));
        $gate->setTextColor(env('agegate_text_color'));
        
        $gate->setRemoveReference(env('agegate_remove_reference'));
        $gate->setRemoveVisiting(env('agegate_remove_visiting'));
        
        $gate->setTestMode(env('agegate_test_mode'));
        $gate->setTestAnyIp(env('agegate_test_anyip'));
        $gate->setTestIp(env('agegate_test_ip'));
        
        $gate->setStartFrom(env('agegate_start_from'));
        
        $gate->setDesktopSessionLifetime(env('agegate_desktop_session_lifetime'));
        $gate->setMobileSessionLifetime(env('agegate_mobile_session_lifetime'));
        
        $gate->run();
        
        return $next($request);
    }
}
