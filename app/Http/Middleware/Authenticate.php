<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * @param 
     * @return string|null
     */

     protected function redirectTo($request)
     {
        if (! $request->expectsJson()) {
            return route('login.form');
        }
     }
}