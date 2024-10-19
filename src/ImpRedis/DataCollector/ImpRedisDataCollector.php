<?php

declare(strict_types=1);

namespace App\ImpRedis\DataCollector;

use Snc\RedisBundle\DataCollector\RedisDataCollector;
use Symfony\Component\VarDumper\Cloner\Data;

class ImpRedisDataCollector extends RedisDataCollector
{
    public function getName(): string
    {
        return 'redis';
    }

    public function extractResult(array $command): Data
    {
        if (!$this->hasResult($command)) {
            return $this->cloneVar('N/A');
        }

        if (!is_string($command['result'])) {
            return $this->cloneVar($command['result']);
        }

        $decodedValue = json_decode($command['result'], true);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $this->cloneVar($decodedValue);
        }

        return $this->cloneVar($command['result']);
    }

    public function hasResult(array $command): bool
    {
        return str_starts_with($command['cmd'], 'GET') && false === $command['error'];
    }
}
