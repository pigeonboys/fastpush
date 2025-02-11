# Fastpush

## Introduction

Fastpush is a simple and efficient PHP package designed for sending push notifications. It allows you to easily configure and send notifications to users through channels and topics.

## Installation

To install the package, run the following command:

```bash
composer require pigeonboys/fastpush
```

## Usage

### Configuration

Before calling the `PushClient` class for the first time, the `PushConfiguration` class must be initialized:

```php
use PigeonBoys\Fastpush\Client\PushConfiguration;

PushConfiguration::initialize(
    host: 'https://example.com/api/push',
    token: '<bearer-token>'
);
```

### Send Notifications

Use the `PushClient::send` method to send notifications to specific recipients through a defined channel and topic:

```php
use Fastpush\Client\PushClient;
use Fastpush\Entity\Channel;
use Fastpush\Entity\Message;
use Fastpush\Entity\Topic;

$channel = new Channel(
    externalId: 'channel.test',
    name: 'Test Channel',
    imageUrl: 'https://example.com/images/test.png'
);

$topic = new Topic(
    externalId: 'topic.test',
    name: 'Test Topic',
    category: 0
);

$messages = [
    new Message(
        recipients: [100100, 100200],
        content: 'Hey Folks! That is a test message for 100100 and 100200.'
    ),
    new Message(
        recipients: [100300, 100400],
        content: 'Hey Folks! That is a test message for 100300 and 100400.'
    )
];

$res = PushClient::send(
    channel: $channel,
    topic: $topic,
    messages: $messages
);
```
