<?php

use ShoestenTag\LogHttp\Exceptions\InterceptorException;

test('can create interceptor exception with message', function () {
    $message = 'Test exception message';
    $exception = new InterceptorException($message);

    expect($exception->getMessage())->toBe($message);
    expect($exception->getCode())->toBe(0);
});

test('can create interceptor exception with message and code', function () {
    $message = 'Test exception message';
    $code = 500;
    $exception = new InterceptorException($message, $code);

    expect($exception->getMessage())->toBe($message);
    expect($exception->getCode())->toBe($code);
});

test('can create interceptor exception with previous exception', function () {
    $message = 'Test exception message';
    $previousException = new Exception('Previous exception');
    $exception = new InterceptorException($message, 0, $previousException);

    expect($exception->getMessage())->toBe($message);
    expect($exception->getPrevious())->toBe($previousException);
});

test('interceptor exception extends exception', function () {
    $exception = new InterceptorException('Test');

    expect($exception)->toBeInstanceOf(Exception::class);
});

