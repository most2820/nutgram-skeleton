<?php

declare(strict_types=1);

namespace App\Middleware;

use SergiX44\Nutgram\Nutgram;

final class AccessChecker
{
    public function __invoke(Nutgram $nutgram, $next): void
    {
        $next($nutgram);
    }
}