<?php

namespace PigeonBoys\Fastpush\Builder;

use PigeonBoys\Fastpush\Entity\Channel;
use PigeonBoys\Fastpush\Entity\Message;
use PigeonBoys\Fastpush\Entity\Topic;

/**
 * @internal
 */
class PushBuilder
{
    public static function json(Channel $channel, Topic $topic, array $messages): array
    {
        if (!$channel || !$topic || empty($messages)) {
            throw new \InvalidArgumentException('Invalid input: Channel, Topic, and Messages are required.');
        }

        foreach ($messages as $message) {
            if (!$message instanceof Message) {
                throw new \InvalidArgumentException("Invalid input: All elements in messages must be instances of Message.");
            }
        }

        $messageArr = [];
        foreach ($messages as $message) {
            $messageArr[] = [
                'recipients' => $message->recipients,
                'subject' => $message->subject,
                'content' => $message->content,
                'attachments' => $message->attachments,
            ];
        }

        return [
            'channel' => [
                'external_id' => $channel->externalId,
                'name' => $channel->name,
                'image_url' => $channel->imageUrl,
                'topic' => [
                    'external_id' => $topic->externalId,
                    'name' => $topic->name,
                    'category' => $topic->category,
                    'messages' => $messageArr,
                ],
            ],
        ];
    }
}
