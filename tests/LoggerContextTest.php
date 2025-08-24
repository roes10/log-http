<?php

use ShoestenTag\LogHttp\LoggerContext;
use ShoestenTag\LogHttp\Contracts\LogStrategy;

test('can set log strategy', function () {
    $context = new LoggerContext();
    $strategy = Mockery::mock(LogStrategy::class);

    $context->setLogStrategy($strategy);

    // Use reflection to verify the strategy was set
    $reflection = new ReflectionClass($context);
    $property = $reflection->getProperty('logStrategy');
    $property->setAccessible(true);

    expect($property->getValue($context))->toBe($strategy);
});

test('can set null log strategy', function () {
    $context = new LoggerContext();
    $strategy = Mockery::mock(LogStrategy::class);

    $context->setLogStrategy($strategy);
    $context->setLogStrategy(null);

    // Use reflection to verify the strategy was set to null
    $reflection = new ReflectionClass($context);
    $property = $reflection->getProperty('logStrategy');
    $property->setAccessible(true);

    expect($property->getValue($context))->toBeNull();
});

test('log calls strategy when set', function () {
    $context = new LoggerContext();
    $strategy = Mockery::mock(LogStrategy::class);
    $data = ['test' => 'data'];

    $strategy->shouldReceive('log')
        ->once()
        ->with($data);

    $context->setLogStrategy($strategy);
    $context->log($data);
});

test('log does nothing when strategy not set', function () {
    $context = new LoggerContext();
    $data = ['test' => 'data'];

    // Should not throw any exception
    $context->log($data);

    expect(true)->toBeTrue(); // Just to have an assertion
});

test('log does nothing when strategy is null', function () {
    $context = new LoggerContext();
    $data = ['test' => 'data'];

    $context->setLogStrategy(null);

    // Should not throw any exception
    $context->log($data);

    expect(true)->toBeTrue(); // Just to have an assertion
});
