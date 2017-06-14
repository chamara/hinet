<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Questions;
use App\Models\AdminSettings;

class CheckStartupQuestionsCount
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
        $count = questions::count();
        $max_questions = adminsettings::first()->max_startup_questions;

        if ($count >= $max_questions) {
            return redirect('/panel/admin/questions');
        }

        return $next($request);
    }
}