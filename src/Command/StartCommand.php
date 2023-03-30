<?php

declare(strict_types=1);

namespace App\Command;

use SergiX44\Nutgram\Nutgram;
use Symfony\Contracts\Translation\TranslatorInterface;

final class StartCommand
{
    private TranslatorInterface $translator;

    public function __construct(
        TranslatorInterface $translator
    )
    {
        $this->translator = $translator;
    }

    public function __invoke(Nutgram $nutgram): void
    {
        $nutgram->sendMessage($this->translator->trans("message.hello_world"), [
            'chat_id' => $nutgram->user()->id,
        ]);
    }
}