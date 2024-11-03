<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp;

use Illuminate\Support\Facades\Log;
use ShoestenTag\LogHttp\Contracts\LogStrategy;

final class LogRequestStrategy implements LogStrategy
{
    public function log($data): void
    {
        Log::info('HTTP Request', [
            'timestamp' => now()->toDateTimeString(),
            'method' => request()->method(),
            'url' => request()->fullUrl(),
            'ip' => request()->ip(),
            'payload' => $data,
        ]);
    }
}
