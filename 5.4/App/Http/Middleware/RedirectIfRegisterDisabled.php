<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AdminSettings;

class RedirectIfRegisterDisabled
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
        $settings = AdminSettings::first();
        $Uri = $request->path();

        if ( $settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'yes' ) {            
            return redirect('/login');
        } elseif ( $settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'no' && ( $Uri == 'register/startup' || $Uri == 'register') ) {
            return redirect('/register/investor');
        } elseif ( $settings->disable_investors_reg == 'yes' && $settings->disable_startups_reg == 'no' && ( $Uri == 'register/investor'  || $Uri == 'register') ) {
            return redirect('/register/startup');
        }

        return $next($request);
    }
}