<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

use Psr\Log\NullLogger;

return [
    LoggerInterface::class => static fn (ContainerInterface $container): LoggerInterface => $container->get(NullLogger::class),
];