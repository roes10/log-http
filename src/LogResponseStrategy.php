<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp;

use Illuminate\Support\Facades\Log;
use ShoestenTag\LogHttp\Contracts\LogStrategy;

final class LogResponseStrategy implements LogStrategy
{
    public function log($data): void
    {
        Log::info('HTTP Response', [
            'timestamp' => now()->toDateTimeString(),
            'status' => $data->status(),
            'headers' => $data->headers->all(),
            'content' => $this->getResponseContent($data),
        ]);
    }

    private function getResponseContent($response): mixed
    {
        $content = $response->getContent();

        if (is_string($content)) {
            $decoded = json_decode($content, true);
            return $decoded ?? $content;
        }

        return $content;
    }
}
