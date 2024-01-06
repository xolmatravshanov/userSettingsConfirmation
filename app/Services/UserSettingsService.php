<?php

namespace App\Services;

use App\Repositories\UserSettingsRepository;

class UserSettingsService
{
    /**
     * @var null
     */
    private $userSettingsRepository = null;

    /**
     * UserSettingsService constructor.
     */
    public function __construct()
    {
        $this->userSettingsRepository = new UserSettingsRepository();
    }

    /**
     * @param int $userId
     * @param string $settingKey
     * @param string $settingValue
     * @return bool
     */
    public function changeSetting(int $userId, string $settingKey, string $settingValue): bool
    {
        return $this->userSettingsRepository
            ->updateSetting($userId, $settingKey, $settingValue);
    }

    /**
     * @param int $userId
     * @param string $settingKey
     * @param string $settingValue
     * @return bool
     */
    public function createSettings(int $userId, string $settingKey, string $settingValue): bool
    {
        return $this->userSettingsRepository
            ->createSetting($userId, $settingKey, $settingValue);
    }
}
