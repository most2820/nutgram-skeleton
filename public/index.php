<?php

declare(strict_types=1);

use SergiX44\Nutgram\Nutgram;
use SergiX44\Nutgram\RunningMode\Webhook;

chdir(dirname(__DIR__));
/** @var Nutgram $nutgram */
$nutgram = require_once dirname(__DIR__) . '/autoload.php';
$nutgram->setRunningMode(Webhook::class);
$nutgram->run();