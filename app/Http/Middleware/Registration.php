<?php

namespace App\Http\Middleware;

use Closure;

class Registration
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
           dd($this->student);
            if ($this->student->registration_paid) {
                return $next($request);
            }
        return redirect('/');
    }
}
