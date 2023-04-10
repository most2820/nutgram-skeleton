<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Log\LoggerInterface;
use SergiX44\Nutgram\Nutgram;
use Throwable;

final class ErrorHandler
{
    private LoggerInterface $logger;

    public function __construct(
        LoggerInterface $logger,
    )
    {
        $this->logger = $logger;
    }

    public function __invoke(Nutgram $nutgram, Throwable $exception): void
    {
        $this->logger->error($exception->getMessage(), [
            'exception' => $exception
        ]);
    }
}