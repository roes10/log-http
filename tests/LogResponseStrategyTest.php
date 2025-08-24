<?php

use ShoestenTag\LogHttp\LogResponseStrategy;
use Illuminate\Support\Facades\Log;

test('log response strategy implements log strategy interface', function () {
    $strategy = new LogResponseStrategy();

    expect($strategy)->toBeInstanceOf(\ShoestenTag\LogHttp\Contracts\LogStrategy::class);
});

test('log method exists and is callable', function () {
    $strategy = new LogResponseStrategy();

    expect(method_exists($strategy, 'log'))->toBeTrue();
    expect(is_callable([$strategy, 'log']))->toBeTrue();
});

test('getResponseContent method exists and is private', function () {
    $strategy = new LogResponseStrategy();

    expect(method_exists($strategy, 'getResponseContent'))->toBeTrue();

    $reflection = new ReflectionClass($strategy);
    $method = $reflection->getMethod('getResponseContent');
    expect($method->isPrivate())->toBeTrue();
});
