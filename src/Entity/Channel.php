<?php

namespace PigeonBoys\Fastpush\Entity;

class Channel
{
    public ?string $externalId = null;
    public ?string $name = null;
    public ?string $imageUrl = null;

    public function __construct(string $externalId, string $name, string $imageUrl)
    {
        $this->externalId = $externalId;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
    }
}
