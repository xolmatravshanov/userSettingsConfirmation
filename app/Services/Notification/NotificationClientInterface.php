<?php

namespace App\Services\Notification;

interface NotificationClientInterface
{
    /**
     * @return string
     */
    public static function getType(): string;

    /**
     * @param string $data
     * @return bool
     */
    public function send(string $data): bool;
}

