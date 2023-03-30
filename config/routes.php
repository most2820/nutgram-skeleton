<?php

declare(strict_types=1);

use App\Command\StartCommand;
use SergiX44\Nutgram\Nutgram;

return function (Nutgram $nutgram) {
    $nutgram->onCommand('start', StartCommand::class);
};