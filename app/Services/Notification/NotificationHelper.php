<?php

namespace App\Services\Notification;


class NotificationHelper
{
    /**
     *
     */
    const NOTIFICATION_TYPE_CLASS_LIST = [
        EmailClient::class,
        TelegramClient::class,
        SmsClient::class,
    ];

    /**
     * @param $notificationType
     * @return NotificationClientInterface
     * @throws \Exception
     */
    public static function getClass($notificationType): NotificationClientInterface
    {
        /**
         * @var $class NotificationClientInterface
         */
        foreach (self::NOTIFICATION_TYPE_CLASS_LIST as $class) {
            if ($class::getType() == $notificationType) {
                return (new $class());
            }
        }
        throw  new \Exception('Unknown notification type');
    }
}
