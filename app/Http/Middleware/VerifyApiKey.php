<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class VerifyApiKey
{
    public function handle(Request $request, Closure $next)
    {
        $apiKey = config('app.api_key');

        $apiKeyIsValid = (
            ! empty($apiKey)
            && $request->header('x-api-key') == $apiKey
        );

        abort_if (! $apiKeyIsValid, 403, 'Access denied');

        return $next($request);
    }
}
