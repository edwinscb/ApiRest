<?php

namespace App\Http\Middleware;

use Closure;

class JsonFormattingMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->headers->get('Content-Type') === 'application/json') {
            $content = $response->getContent();
            $content = json_encode(json_decode($content), JSON_PRETTY_PRINT);
            $response->setContent($content);
        }

        return $response;
    }
}
