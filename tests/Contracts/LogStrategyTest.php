<?php

use ShoestenTag\LogHttp\Contracts\LogStrategy;

test('log strategy interface has log method', function () {
    $reflection = new ReflectionClass(LogStrategy::class);
    $methods = $reflection->getMethods();

    expect($methods)->toHaveCount(1);
    expect($methods[0]->getName())->toBe('log');
    expect($methods[0]->isPublic())->toBeTrue();
    expect($methods[0]->getReturnType()->getName())->toBe('void');
});

test('log strategy interface accepts mixed parameter', function () {
    $reflection = new ReflectionClass(LogStrategy::class);
    $method = $reflection->getMethod('log');
    $parameters = $method->getParameters();

    expect($parameters)->toHaveCount(1);
    expect($parameters[0]->getName())->toBe('data');

    $type = $parameters[0]->getType();
    if ($type !== null) {
        expect($type->getName())->toBe('mixed');
    } else {
        expect($type)->toBeNull();
    }
});

