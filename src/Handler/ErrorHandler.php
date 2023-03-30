<?php

declare(strict_types=1);

namespace App\Handler;

use Psr\Log\LoggerInterface;
use SergiX44\Nutgram\Nutgram;
use Symfony\Contracts\Translation\TranslatorInterface;
use Throwable;

final class ErrorHandler
{
    private LoggerInterface $logger;
    private TranslatorInterface $translator;

    public function __construct(
        LoggerInterface     $logger,
        TranslatorInterface $translator
    )
    {
        $this->logger = $logger;
        $this->translator = $translator;
    }

    public function __invoke(Nutgram $nutgram, Throwable $exception): void
    {
        $this->logger->error($exception->getMessage(), [
            'exception' => $exception
        ]);

        $nutgram->sendMessage($this->translator->trans('error.message'), [
            'chat_id' => $nutgram->user()->id
        ]);
    }
}