<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use ShoestenTag\LogHttp\Exceptions\InterceptorException;

class InterceptMiddleware
{
    public function __construct(private Interceptor $interceptor) {}

    public function handle(Request $request, Closure $next): Response
    {
        try {
            $controller = $request->route()->getController();
            $method = $request->route()->getActionMethod();

            $this->interceptor->handleRequest($controller, $method, $request->all());

            $response = $next($request);

            $this->interceptor->handleResponse($controller, $method, $response);

            return $response;
        } catch (InterceptorException $e) {
            Log::error('Failed to process HTTP logging', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return $next($request);
        }
    }
}
