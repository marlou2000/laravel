<?php

namespace App\Http\Middleware;

use Closure;

class Restriction
{
    public function handle($request, Closure $next)
    {
        // Check for a specific condition to restrict access, for example:
        if ($request->header('X-System-Access') === 'true') {
            return $next($request);
        }

        // Redirect or deny access for end users
        return abort(403); // You can also use redirect() to redirect to a specific route
    }
}
