<?php

namespace App\Http\Middleware;

use App\Models\BlockedIp;
use Closure;
use Illuminate\Http\Request;

class BlockIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $blockedIp = BlockedIp::where('ip_address', $request->ip())->first();

        if ($blockedIp) {
            abort(403, 'Access denied due to blocked IP.');
        }

        return $next($request);
    }
}
