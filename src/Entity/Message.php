<?php

namespace PigeonBoys\Fastpush\Entity;

class Message
{
    public ?array $recipients = null;
    public ?string $content = null;

    public function __construct(array $recipients, string $content)
    {
        $this->recipients = $recipients;
        $this->content = $content;
    }
}
