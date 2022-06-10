<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

/*Copy All The Codes of Authenticate.php Files*/
class Admin extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin_login');
        }
    }
}
