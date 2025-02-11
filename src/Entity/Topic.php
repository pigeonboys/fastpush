<?php

namespace PigeonBoys\Fastpush\Entity;

class Topic
{
    public ?string $externalId = null;
    public ?string $name = null;
    public ?int $category = null;

    public function __construct(string $externalId, string $name, int $category)
    {
        $this->externalId = $externalId;
        $this->name = $name;
        $this->category = $category;
    }
}
