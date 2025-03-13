<?php

namespace PigeonBoys\Fastpush\Entity;

class Message
{
    public ?array $recipients = null;
    public ?string $content = null;
    public ?array $attachments = null;

    public function __construct(array $recipients, string $content, ?array $attachments = null)
    {
        $this->recipients = $recipients;
        $this->content = $content;
        $this->attachments = $attachments;
    }
}
