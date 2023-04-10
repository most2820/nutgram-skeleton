<?php

declare(strict_types=1);

use App\Middleware\AccessChecker;
use App\Middleware\TranslatorLocale;
use SergiX44\Nutgram\Nutgram;

return function (Nutgram $nutgram) {
    $nutgram->middleware(TranslatorLocale::class);
    $nutgram->middleware(AccessChecker::class);
};