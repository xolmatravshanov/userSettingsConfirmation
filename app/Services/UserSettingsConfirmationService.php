<?php

namespace App\Services;

use App\Enums\UserSettingsConfirmationStatusEnum;
use App\Repositories\UserSettingsConfirmationRepository;
use App\Services\Notification\NotificationClientInterface;
use App\Services\Notification\NotificationHelper;

class UserSettingsConfirmationService
{
    /**
     * @var UserSettingsConfirmationRepository|null
     */
    protected $userSettingsConfirmation = null;

    /**
     * UserSettingsConfirmationService constructor.
     */
    public function __construct()
    {
        $this->userSettingsConfirmation = new UserSettingsConfirmationRepository();
    }

    /**
     * @param int $userId
     * @param string $settingKey
     * @param string $confirmationMethod
     * @return bool
     */
    public function sendConfirmationCode(int $userId, string $settingKey, string $confirmationMethod): bool
    {
        /**
         * @var $class NotificationClientInterface
         */
        $code = $this->generateConfirmationCode();
        $class = NotificationHelper::getClass($confirmationMethod);
        $class->send($code);
        return $this->userSettingsConfirmation
            ->createUserSettingsConfirmation(
                $userId,
                $settingKey,
                $confirmationMethod,
                $code
            );
    }

    /**
     * @param int $userId
     * @param string $settingKey
     * @param int $confirmationCode
     * @return bool
     */
    public function confirmChange(int $userId, string $settingKey, int $confirmationCode): bool
    {

        $status = UserSettingsConfirmationStatusEnum::STATUS_ERROR;

        if ($this->validateCode($userId, $settingKey, $confirmationCode)) {
            $status = UserSettingsConfirmationStatusEnum::STATUS_CONFIRMED;
        }

        return $this->userSettingsConfirmation->updateUserSettingsConfirmation(
            $userId,
            $settingKey,
            $status
        );
    }

    /**
     * @param int $userId
     * @param string $settingKey
     * @param int $confirmationCode
     * @return bool
     */
    public function validateCode(int $userId, string $settingKey, int $confirmationCode): bool
    {
        return true;
    }

    public function generateConfirmationCode(): int
    {
        return random_int(100000, 999999);
    }

}
