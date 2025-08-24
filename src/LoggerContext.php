<?php

declare(strict_types=1);

namespace ShoestenTag\LogHttp;

use ShoestenTag\LogHttp\Contracts\LogStrategy;

class LoggerContext
{
    private ?LogStrategy $logStrategy = null;

    public function setLogStrategy(?LogStrategy $logStrategy): void
    {
        $this->logStrategy = $logStrategy;
    }

    public function log($data): void
    {
        if ($this->logStrategy !== null) {
            $this->logStrategy->log($data);
        }
    }
}
