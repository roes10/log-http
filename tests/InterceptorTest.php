<?php

use ShoestenTag\LogHttp\Interceptor;
use ShoestenTag\LogHttp\Attributes\Intercept;

// Test controller classes
#[Intercept(request: true, response: true)]
class TestControllerWithClassAttribute
{
    public function index()
    {
        return 'test';
    }
}

class TestControllerWithMethodAttribute
{
    #[Intercept(request: true, response: true)]
    public function index()
    {
        return 'test';
    }
}

class TestControllerWithoutAttribute
{
    public function index()
    {
        return 'test';
    }
}

test('interceptor can be instantiated', function () {
    $interceptor = new Interceptor();

    expect($interceptor)->toBeInstanceOf(Interceptor::class);
});

test('handleRequest method exists and is callable', function () {
    $interceptor = new Interceptor();

    expect(method_exists($interceptor, 'handleRequest'))->toBeTrue();
    expect(is_callable([$interceptor, 'handleRequest']))->toBeTrue();
});

test('handleResponse method exists and is callable', function () {
    $interceptor = new Interceptor();

    expect(method_exists($interceptor, 'handleResponse'))->toBeTrue();
    expect(is_callable([$interceptor, 'handleResponse']))->toBeTrue();
});

test('resolveAttributes method exists and is private', function () {
    $interceptor = new Interceptor();

    expect(method_exists($interceptor, 'resolveAttributes'))->toBeTrue();

    $reflection = new ReflectionClass($interceptor);
    $method = $reflection->getMethod('resolveAttributes');
    expect($method->isPrivate())->toBeTrue();
});

