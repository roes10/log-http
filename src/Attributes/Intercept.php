<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final readonly class Intercept
{
    public function __construct(
        public bool $request = true,
        public bool $response = false,
    ) {}
}
