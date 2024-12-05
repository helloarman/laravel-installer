<?php

namespace Helloarman\LaravelInstaller\Middleware;

use Closure;
use DB;

/**
 * Class canInstall
 * @package Helloarman\LaravelInstaller\Middleware
 */

class InstallerGlobalMiddleware
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

        if (!file_exists(storage_path('installed')) && $request->is('/')) {
            return redirect()->route("LaravelInstaller::welcome");
        }

        return $next($request);
    }
}
