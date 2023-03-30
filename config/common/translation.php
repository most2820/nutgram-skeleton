<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Symfony\Component\Translation\Loader\PhpFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Contracts\Translation\TranslatorInterface;

return [
    TranslatorInterface::class => DI\get(Translator::class),

    Translator::class => static function (ContainerInterface $container): Translator {
        $config = $container->get('config')['translator'];

        $translator = new Translator($config['lang']);
        $translator->addLoader('php', new PhpFileLoader());

        foreach ($config['resources'] as $resource) {
            $translator->addResource($resource['format'], $resource['file'], $resource['lang']);
        }

        return $translator;
    },

    'config' => [
        'translator' => [
            'lang' => 'en',
            'resources' => [
                [
                    'format' => 'php',
                    'file' => dirname(__DIR__, 2) . '/translations/exceptions.en.php',
                    'lang' => 'en',
                ],
                [
                    'format' => 'php',
                    'file' => dirname(__DIR__, 2) . '/translations/exceptions.ru.php',
                    'lang' => 'ru',
                ],
                [
                    'format' => 'php',
                    'file' => dirname(__DIR__, 2) . '/translations/messages.en.php',
                    'lang' => 'en',
                ],
                [
                    'format' => 'php',
                    'file' => dirname(__DIR__, 2) . '/translations/messages.ru.php',
                    'lang' => 'ru',
                ],
            ],
        ],
        'locales' => [
            'allowed' => [
                'en',
                'ru'
            ],
        ],
    ],
];