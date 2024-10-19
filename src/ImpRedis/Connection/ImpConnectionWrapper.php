<?php

declare(strict_types=1);

namespace App\ImpRedis\Connection;

use Predis\Command\CommandInterface;
use Snc\RedisBundle\Client\Predis\Connection\ConnectionWrapper;

class ImpConnectionWrapper extends ConnectionWrapper
{
    public function executeCommand(CommandInterface $command)
    {
        $result = parent::executeCommand($command);

        $this->logger->logResult($result);

        return $result;
    }
}
