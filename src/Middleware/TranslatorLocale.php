<?php

declare(strict_types=1);

namespace App\Middleware;

use SergiX44\Nutgram\Nutgram;
use Symfony\Contracts\Translation\TranslatorInterface;

final class TranslatorLocale
{
    private TranslatorInterface $translator;

    public function __construct(
        TranslatorInterface $translator
    )
    {
        $this->translator = $translator;
    }

    public function __invoke(Nutgram $nutgram, $next): void
    {
        $this->translator->setLocale($nutgram->user()->language_code);
        $next($nutgram);
    }
}