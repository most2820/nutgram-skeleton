<?php

declare(strict_types=1);

use App\Handler\ErrorHandler;
use Dotenv\Dotenv;
use Psr\Container\ContainerInterface;
use SergiX44\Nutgram\Nutgram;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

/** @var ContainerInterface $container */
$container = require __DIR__ . '/config/container.php';

/** @var Nutgram $nutgram */
$nutgram = $container->get(Nutgram::class);

(require __DIR__ . '/config/middleware.php')($nutgram);
(require __DIR__ . '/config/routes.php')($nutgram);

$nutgram->onException(ErrorHandler::class);

return $nutgram;