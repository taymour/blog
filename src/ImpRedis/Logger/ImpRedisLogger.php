<?php

declare(strict_types=1);

namespace App\ImpRedis\Logger;

use Snc\RedisBundle\Logger\RedisLogger;

class ImpRedisLogger extends RedisLogger
{
    public function logResult(mixed $result): void
    {
        $command = array_merge(end($this->commands), ['result' => $result]);
        $lastIndex = array_key_last($this->commands);
        $this->commands[$lastIndex] = $command;
    }
}
