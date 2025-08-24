<?php

use ShoestenTag\LogHttp\InterceptMiddleware;
use ShoestenTag\LogHttp\Interceptor;
use ShoestenTag\LogHttp\Attributes\Intercept;

// Test controller class
#[Intercept(request: true, response: true)]
class TestControllerWithClassAttributeForMiddleware
{
    public function index()
    {
        return 'test';
    }
}

test('intercept middleware can be instantiated', function () {
    $interceptor = new Interceptor();
    $middleware = new InterceptMiddleware($interceptor);

    expect($middleware)->toBeInstanceOf(InterceptMiddleware::class);
});

test('handle method exists and is callable', function () {
    $interceptor = new Interceptor();
    $middleware = new InterceptMiddleware($interceptor);

    expect(method_exists($middleware, 'handle'))->toBeTrue();
    expect(is_callable([$middleware, 'handle']))->toBeTrue();
});

test('constructor accepts interceptor dependency', function () {
    $interceptor = new Interceptor();
    $middleware = new InterceptMiddleware($interceptor);

    // Use reflection to verify the interceptor was set
    $reflection = new ReflectionClass($middleware);
    $property = $reflection->getProperty('interceptor');
    $property->setAccessible(true);

    expect($property->getValue($middleware))->toBe($interceptor);
});

