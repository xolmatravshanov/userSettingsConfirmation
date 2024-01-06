<?php

namespace App\Repositories;

class UserSettingsConfirmationRepository
{
    public function createUserSettingsConfirmation($userId, $settingKey, $confirmationMethod, $code): bool
    {
        return true;
    }

    public function getUserSettingsConfirmation($userId, $settingKey): bool
    {
        return true;
    }

    public function updateUserSettingsConfirmation($userId, $settingKey, $status): bool
    {
        return true;
    }
}
