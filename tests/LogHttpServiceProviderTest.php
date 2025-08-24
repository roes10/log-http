<?php

use ShoestenTag\LogHttp\LogHttpServiceProvider;
use ShoestenTag\LogHttp\Interceptor;
use ShoestenTag\LogHttp\InterceptMiddleware;

test('service provider can be instantiated', function () {
    $provider = new LogHttpServiceProvider(app());

    expect($provider)->toBeInstanceOf(LogHttpServiceProvider::class);
});

test('service provider extends base service provider', function () {
    $provider = new LogHttpServiceProvider(app());

    expect($provider)->toBeInstanceOf(\Illuminate\Support\ServiceProvider::class);
});

test('register method exists and is callable', function () {
    $provider = new LogHttpServiceProvider(app());

    expect(method_exists($provider, 'register'))->toBeTrue();
    expect(is_callable([$provider, 'register']))->toBeTrue();
});

