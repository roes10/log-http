<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp\Contracts;

interface LogStrategy
{
    public function log($data): void;
}
