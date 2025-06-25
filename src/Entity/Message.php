<?php

namespace PigeonBoys\Fastpush\Entity;

class Message
{
    public ?array $recipients = null;
    public ?string $subject = null;
    public ?string $content = null;
    public ?array $attachments = null;

    public function __construct(array $recipients, string $subject, ?string $content = null, ?array $attachments = null)
    {
        $this->recipients = $recipients;
        $this->subject = $subject;
        $this->content = $content;
        $this->attachments = $attachments;
    }
}
