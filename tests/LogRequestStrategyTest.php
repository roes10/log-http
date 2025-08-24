<?php

use ShoestenTag\LogHttp\LogRequestStrategy;
use Illuminate\Support\Facades\Log;

test('log request strategy implements log strategy interface', function () {
    $strategy = new LogRequestStrategy();

    expect($strategy)->toBeInstanceOf(\ShoestenTag\LogHttp\Contracts\LogStrategy::class);
});

test('log method exists and is callable', function () {
    $strategy = new LogRequestStrategy();

    expect(method_exists($strategy, 'log'))->toBeTrue();
    expect(is_callable([$strategy, 'log']))->toBeTrue();
});
