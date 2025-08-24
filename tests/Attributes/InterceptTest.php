<?php

use ShoestenTag\LogHttp\Attributes\Intercept;

test('can create intercept attribute with default values', function () {
    $attribute = new Intercept();

    expect($attribute->request)->toBeFalse();
    expect($attribute->response)->toBeFalse();
});

test('can create intercept attribute with request only', function () {
    $attribute = new Intercept(request: true);

    expect($attribute->request)->toBeTrue();
    expect($attribute->response)->toBeFalse();
});

test('can create intercept attribute with response only', function () {
    $attribute = new Intercept(response: true);

    expect($attribute->request)->toBeFalse();
    expect($attribute->response)->toBeTrue();
});

test('can create intercept attribute with both enabled', function () {
    $attribute = new Intercept(request: true, response: true);

    expect($attribute->request)->toBeTrue();
    expect($attribute->response)->toBeTrue();
});

