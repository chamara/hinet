<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\AdminSettings;

class SetRedirectOnRegister
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
        $settings = adminsettings::first();

        if ( $settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'yes' ) {
            return redirect('/login');
        }

        if ( $settings->disable_startups_reg == 'yes' && $settings->disable_investors_reg == 'no' ) {
            return redirect('/register/investor');
        } 

        if ( $settings->disable_investors_reg == 'yes' && $settings->disable_startups_reg == 'no' ) {
            return redirect('/register/startup');
        }

        return $next($request);
    }
}
