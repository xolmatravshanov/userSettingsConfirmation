<?php

namespace App\Services\Notification;


use App\Enums\NotificationTypesEnum;


class TelegramClient implements NotificationClientInterface
{
    /**
     * @param string $data
     * @return bool
     */
    public function send(string $data): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public static function getType(): string
    {
        return NotificationTypesEnum::TYPE_TELEGRAM;
    }

}
