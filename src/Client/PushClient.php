<?php

namespace PigeonBoys\Fastpush\Client;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use PigeonBoys\Fastpush\Builder\PushBuilder;
use PigeonBoys\Fastpush\Entity\Channel;
use PigeonBoys\Fastpush\Entity\Topic;

class PushClient
{
    public static function send(Channel $channel, Topic $topic, array $messages)
    {
        $client = new Client();

        try {
            $response = $client->post(PushConfiguration::getUrl(), [
                'headers' => [
                    'Authorization' => 'Bearer ' . PushConfiguration::getToken(),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ],
                'json' => PushBuilder::json($channel, $topic, $messages),
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            $errorResponse = $e->getResponse();
            $errorMessage = $errorResponse ? (string) $errorResponse->getBody() : 'No response body';
            throw new Exception('PushClient request failed: ' . $e->getMessage() . ' - Response: ' . $errorMessage, 0, $e);
        } catch (Exception $e) {
            throw new Exception('PushClient failed: ' . $e->getMessage(), 0, $e);
        }
    }
}
