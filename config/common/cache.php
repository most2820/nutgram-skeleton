<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Psr\SimpleCache\CacheInterface;
use SergiX44\Nutgram\Cache\Adapters\ArrayCache;
use SergiX44\Nutgram\Cache\ConversationCache;
use SergiX44\Nutgram\Cache\GlobalCache;
use SergiX44\Nutgram\Cache\UserCache;

return [
    CacheInterface::class => static fn(ContainerInterface $container): CacheInterface => $container->get(ArrayCache::class),
    ConversationCache::class => static fn(ContainerInterface $container): CacheInterface => $container->get(CacheInterface::class),
    GlobalCache::class => static fn(ContainerInterface $container): CacheInterface => $container->get(CacheInterface::class),
    UserCache::class => static fn(ContainerInterface $container): CacheInterface => $container->get(CacheInterface::class),
];