<?php

namespace PigeonBoys\Fastpush\Client;

class PushConfiguration
{
    private static string $url = '';
    private static string $token = '';

    public static function initialize(string $host, string $token): void
    {
        if (empty($host) || empty($token)) {
            throw new \InvalidArgumentException("Invalid input: Host, and Token are required.");
        }

        self::$url = $host;
        self::$token = $token;
    }

    private static function checkConfig(): void
    {
        if (empty(self::$url)) {
            throw new \RuntimeException("URI is not set in PushConfiguration.");
        }

        if (empty(self::$token)) {
            throw new \RuntimeException("Token is not set in PushConfiguration.");
        }
    }

    public static function getUrl(): string
    {
        self::checkConfig();
        return self::$url;
    }

    public static function getToken(): string
    {
        self::checkConfig();
        return self::$token;
    }
}
