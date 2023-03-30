<?php

declare(strict_types=1);

use Psr\Log\LoggerInterface;
use Psr\SimpleCache\CacheInterface;
use Psr\Container\ContainerInterface;
use SergiX44\Nutgram\Nutgram;

return [
    Nutgram::class => static function (ContainerInterface $container): Nutgram {
        $config = $container->get('config')['nutgram'];
        return new Nutgram($config['token'], [
            'bot_id' > $config['bot_id'],
            'container' => $container,
            'cache' => $container->get(CacheInterface::class),
            'logger' => $container->get(LoggerInterface::class),
        ]);
    },

    'config' => [
        'nutgram' => [
            'bot_id' => (int)explode(':', $_ENV['TELEGRAM_TOKEN'])[0],
            'token' => $_ENV['TELEGRAM_TOKEN'],
        ],
    ],
];